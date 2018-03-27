<?php
defined('TYPO3_MODE') or die();

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fabx', 'Configuration/TypoScript', 'fabx configuration');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fabx', 'Configuration/TypoScript/IncludeInPage', 'fabx include in page');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fabx', 'Configuration/TypoScript/DefaultResources', 'fabx default resources');
TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('fabx', 'Configuration/TypoScript/IncludeJQuery', 'fabx include external dependencies');