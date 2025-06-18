<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Skip sudo mode',
    'description' => '',
    'category' => 'be',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'alpha',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.4-14.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'classmap' => ['Classes'],
    ],
];
