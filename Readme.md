# TYPO3 Extension `no_sudo_mode`

Use this extension to skip the sudo mode. The only use case is on local systems or if you really know what you do.

This security improvement has been added to mitigate https://typo3.org/security/advisory/typo3-core-sa-2025-013.

## Usage

Install by `composer req georgringer/no-sudo-mode --dev` and
configure the hosts which should be not allowed.


