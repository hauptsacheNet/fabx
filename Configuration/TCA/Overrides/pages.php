<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'pages',
    [
        'tx_fabx_action' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:pages.tx_fabx_action',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_fabx_action',
                'size' => 5
            ]
        ]
    ]
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_fabx_action',
    '1',
    'after:nav_title'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'pages',
    'fabx_action',
    'tx_fabx_action'
);