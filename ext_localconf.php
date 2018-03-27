<?php
defined('TYPO3_MODE') or die();

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fabx/Configuration/TSconfig/tsconfig.txt">');

if(empty($GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'])) {
    $GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] = 'tx_fabx_action';
} else {
    $GLOBALS['TYPO3_CONF_VARS']['FE']['addRootLineFields'] .= ',tx_fabx_action';
}
