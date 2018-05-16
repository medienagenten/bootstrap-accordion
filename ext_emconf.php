<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Bootstrap Accordion',
    'description' => 'Simple Accordion based on IRRE and tt_content',
    'category' => 'plugin',
    'version' => '0.2.2',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'author' => 'Arnd Messer',
    'author_email' => 'messer@medienagenten.de',
    'author_company' => 'BUERO MEDIENAGENTEN',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Medienagenten\\BootstrapAccordion\\' => 'Classes'
        ]
    ],
];
