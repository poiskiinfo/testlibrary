<?php
defined('_CEXEC') or die;
 session_start();
/**
* автозагрузчик класов из папки libraries
*
*Названия должны идти с заглавной буквы пример $obj = new Cms\Txtbd(); где в папке Cms лежит файл Txtbd c именем класса Txtbd
*/

function __autoload($class) {

	// convert namespace to full file path
	$class = CPATH_ROOT.'/libraries/' . str_replace('\\', '/', $class) . '.php';
	if (file_exists($class)){ require_once($class);}


}




// Pre-Load configuration. Don't remove the Output Buffering due to BOM issues, see JCode 26026
ob_start();
require_once CPATH_CONFIGURATION . '/configuration.php';
ob_end_clean();

// System configuration.
$config = new CConfig;

// Set the error_reporting
switch ($config->error_reporting)
{
	case 'default':
	case '-1':
		break;

	case 'none':
	case '0':
		error_reporting(0);

		break;

	case 'simple':
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		ini_set('display_errors', 1);

		break;

	case 'maximum':
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		break;

	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);

		break;

	default:
		error_reporting($config->error_reporting);
		ini_set('display_errors', 1);

		break;
}

define('CDEBUG', $config->debug);
define('CLOG', $config->log);

unset($config);

// System profiler
if (CDEBUG)
{
	// @deprecated 4.0 - The $_PROFILER global will be removed
	//$_PROFILER = JProfiler::getInstance('Application');


}





?>