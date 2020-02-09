<?php
defined('_CEXEC') or die;

$parts = explode(DIRECTORY_SEPARATOR, CPATH_BASE);

define('CPATH_ROOT',          implode(DIRECTORY_SEPARATOR, $parts));
define('CPATH_SITE',          CPATH_ROOT);
define('CPATH_CONFIGURATION', CPATH_ROOT);
define('CPATH_ADMINISTRATOR', CPATH_ROOT . DIRECTORY_SEPARATOR . 'administrator');
define('CPATH_LIBRARIES',     CPATH_ROOT . DIRECTORY_SEPARATOR . 'libraries');
define('CPATH_PLUGINS',       CPATH_ROOT . DIRECTORY_SEPARATOR . 'plugins');
define('CPATH_INSTALLATION',  CPATH_BASE . DIRECTORY_SEPARATOR . 'installation');
define('CPATH_THEMES',        CPATH_BASE . DIRECTORY_SEPARATOR . 'templates');
define('CPATH_CACHE',         CPATH_BASE . DIRECTORY_SEPARATOR . 'cache');
define('CPATH_MANIFESTS',     CPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'manifests');
?>