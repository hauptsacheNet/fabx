<?php

# START OF Hn\Typo3Environment\Generator\ConfigGenerator
# THIS AREA IS AUTO GENERATED BY hauptsache/typo3-environment

// by default, PATH_site is defined without the respecting symlinks which leads to problems during deployment
// however, in composer mode, the typo3 installer defines the env variable TYPO3_PATH_ROOT which does respect symlinks
// this env variable TYPO3_PATH_ROOT will be used by the typo3 environment builder to set PATH_site which solves all problems
if (defined('PATH_site') && rtrim(PATH_site, '/') !== rtrim(realpath(PATH_site), '/')) {
    throw new \RuntimeException("PATH_site is incorrect. Make sure typo3 is using composer mode.");
}

// get the mysql settings off of the environment if they exist. This makes setup in some instances easier.
($value = getenv('MYSQL_DATABASE')) && $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'] = $value;
($value = getenv('MYSQL_USERNAME')) && $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'] = $value;
($value = getenv('MYSQL_PASSWORD')) && $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'] = $value;
($value = getenv('MYSQL_HOST')) && $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'] = $value;
($value = getenv('MYSQL_PORT')) && $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['port'] = $value;

($value = getenv('MAIL_TRANSPORT')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport'] = $value;
($value = getenv('MAIL_SENDMAIL_COMMAND')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = $value;
($value = getenv('MAIL_SMTP_ENCRYPT')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_encrypt'] = $value;
($value = getenv('MAIL_SMTP_PASSWORD')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = $value;
($value = getenv('MAIL_SMTP_SERVER')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = $value;
($value = getenv('MAIL_SMTP_PORT')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_port'] = $value;
($value = getenv('MAIL_SMTP_USERNAME')) && $GLOBALS['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = $value;

($value = getenv('IMAGE_PROCESSOR')) && $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor'] = $value;
($value = getenv('IMAGE_PROCESSOR_COLORSPACE')) && $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_colorspace'] = $value;
($value = getenv('IMAGE_PROCESSOR_PATH')) && $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path'] = $value;
($value = getenv('IMAGE_PROCESSOR_PATH')) && $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path_lzw'] = $value;

// set mysql timezone
$GLOBALS['TYPO3_CONF_VARS']['SYS']['setDBinit'] = implode(";\n", array_filter([
    rtrim($GLOBALS['TYPO3_CONF_VARS']['SYS']['setDBinit'] ?? '', ";\n"),
    "SET time_zone = '" . addslashes(date_default_timezone_get()) . "'"
]));

$applicationContext = \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext();
$dev = $applicationContext !== null ? $applicationContext->isDevelopment() : true;

// set the typical dev settings
$GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] = $dev;
$GLOBALS['TYPO3_CONF_VARS']['FE']['debug'] = $dev;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'] = $dev ? '*' : '';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = $dev;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = getenv('LOG_DEPRECATION');
$GLOBALS['TYPO3_CONF_VARS']['SYS']['exceptionalErrors'] = $dev ? E_ALL & ~(E_STRICT | E_NOTICE) : E_ERROR | E_PARSE;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = $dev ? 1 : 0;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['belogErrorReporting'] = E_ERROR | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_PARSE | E_WARNING | E_CORE_WARNING | E_COMPILE_WARNING | E_USER_WARNING;

$simpleCache = call_user_func(function () use ($dev) {
    // disable simple caches in dev mode
    if ($dev) {
        return \TYPO3\CMS\Core\Cache\Backend\NullBackend::class;
    }

    // if there is apcu use is as it is the fastest cache
    // make sure PATH_site is correctly defined (see condition at the top of the file)
    if (extension_loaded('apcu')) {
        // if the fallback for cli would be file cache, it could not be deleted from the typo3 backend
        return (PHP_SAPI === 'cli' && ini_get('apc.enable_cli') == 0)
            ? \TYPO3\CMS\Core\Cache\Backend\NullBackend::class
            : \TYPO3\CMS\Core\Cache\Backend\ApcuBackend::class;
    }

    // Fallback to database isn't possible as the database would have to create new tables
    // This fallback is not perfect: switching between apcu on and off can lead to old cache showing
    return \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
});

// these are all small caches which don't use tags
// they don't belong in a database since the roundtrip to the database is comparably slow
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_imagesizes']['backend'] = $simpleCache;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['cache_runtime']['backend'] = $simpleCache;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_datamapfactory_datamap']['backend'] = $simpleCache;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_object']['backend'] = $simpleCache;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['extbase_reflection']['backend'] = $simpleCache;
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['l10n']['backend'] = $simpleCache;


$GLOBALS['TYPO3_CONF_VARS']['SYS']['generateApacheHtaccess'] = false;
# END OF Hn\Typo3Environment\Generator\ConfigGenerator

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('config.no_cache = 1');

# START OF Hn\Typo3Environment\Generator\ExtConfGenerator
# THIS AREA IS AUTO GENERATED BY hauptsache/typo3-environment
if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['scheduler'])) {
$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['scheduler'] = str_replace(
's:11:"maxLifetime";s:4:"1440";',
's:11:"maxLifetime";s:2:"60";',
$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['scheduler']);
}
# END OF Hn\Typo3Environment\Generator\ExtConfGenerator
