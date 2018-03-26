<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:fabxActionTableTitle',
        'label' => 'title',
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

    'columns' => [
        'title' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim,required',
                'default' => null
            ]
        ],
        'record_type' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.record_type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    'form' => 1
                ],
                'size' => 1
            ]
        ],
        'form' => [
            'label' => 'LLL:EXT:fabx/Resources/Private/Language/general.xlf:field.form',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'size' => 1
            ]
        ]
    ]
];