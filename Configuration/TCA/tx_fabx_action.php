<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:fabxActionTableTitle',
        'label' => 'title',
        'searchFields' => 'title,tooltip,bodytext',
        'iconfile' => 'EXT:fabx/Resources/Public/Icons/exclamation.svg',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group'
        ],
        'languageField' => 'sys_language_uid',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'type' => 'record_type',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'hideAtCopy' => true,
        'transOrigPointerField' => 'l18n_parent',
        'translationSource' => 'l10n_source',
        'transOrigDiffSourceField' => 'l18n_diffsource',
    ],
    'interface' => [
        'showRecordFieldList' => 'record_type,title',
    ],
    'columns' => [
        'record_type' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.record_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                    ['LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.record_type.text', 'text']
                ],
                'size' => 1
            ]
        ],
        'title' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
                'default' => null
            ]
        ],
        'tooltip' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.tooltip',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
                'default' => null
            ]
        ],
        'icon' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.icon',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'icon',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'maxitems' => 1,
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    --palette--;;filePalette'
                            ],
                        ]
                    ]
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            )
        ],
        'bodytext' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.bodytext',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true
            ]
        ]
    ],
    'types' => [
        0 => [
            'showitem' => 'record_type, title, tooltip, icon'
        ],
        'text' => [
            'showitem' => 'record_type, title, tooltip, icon, bodytext'
        ]
    ]
];