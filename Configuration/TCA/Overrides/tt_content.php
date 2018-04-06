<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/***************
 * Register fields
 */
$temporaryColumns = [
    'bootstrapaccordion_items' => [
        'exclude' => 1,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'Bootstrap Accordion',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tt_content',
            'foreign_field' => 'colPos',
            'foreign_sortby' => 'sorting',
            'maxitems' => '9999',
            'appearance' => [
                'collapseAll' => true,
                'expandSingle' => true,
                'useSortable' => true,
                'enabledControls' => true,
                'newRecordLinkAddTitle' => true,
                'levelLinksPosition' => 'top',
                'showSynchronizationLink' => false,
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
                'showRemovedLocalizationRecords' => true,
            ]
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('tt_content', $temporaryColumns);

/***************
 * Add Content Element: sitepackage_partner
 */
if (!is_array($GLOBALS['TCA']['tt_content']['types']['bootstrap_accordion'])) {
    $GLOBALS['TCA']['tt_content']['types']['bootstrap_accordion'] = [];
}

/***************
 * Add content element to seletor list
 */
ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'Accordion',
        'bootstrap_accordion',
        'EXT:bootstrap_accordion/ext_icon.png'
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['bootstrap_accordion'] = 'default-icon';

/***************
 * Default fields
 */
$showitem_default_01 = '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                       ';
$showitem_default_02 = '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                            --palette--;;language,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                            --palette--;;hidden,
                            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                            categories,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                            rowDescription,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
                       ';

/***************
 * Configure element type
 */
$GLOBALS['TCA']['tt_content']['types']['bootstrap_accordion'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['bootstrap_accordion'],
    [
        'showitem' => $showitem_default_01 . '
        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
        bootstrapaccordion_items,
        ' . $showitem_default_02,
    ]
);
