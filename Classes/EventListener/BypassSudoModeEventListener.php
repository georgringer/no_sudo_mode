<?php
declare(strict_types=1);

namespace GeorgRinger\NoSudoMode\EventListener;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Security\SudoMode\Event\SudoModeRequiredEvent;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

#[AsEventListener(
    identifier: 'ext-nosudomode/bypass-sudo-mode',
)]
class BypassSudoModeEventListener
{

    public function __invoke(SudoModeRequiredEvent $event): void
    {
        $config = $this->getExtensionConfiguration();
        if ($config['skipDomains'] ?? false) {
            $patterns = GeneralUtility::trimExplode(',', $config['skipDomains'], true);
            $host = $this->getRequest()->getUri()->getHost();
            foreach ($patterns as $pattern) {
                if (@preg_match($pattern, $host)) {
                    $event->setVerificationRequired(false);
                }
            }
        }
    }

    private function getExtensionConfiguration(): array
    {
        try {
            return GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('no_sudo_mode');
        } catch (\Exception $exception) {
        }
        return [];
    }

    private function getRequest(): ServerRequestInterface
    {
        return $GLOBALS['TYPO3_REQUEST'];
    }

}
