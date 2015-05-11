<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once(dirname(__FILE__) . '/lib/auth.php');
require_once(dirname(__FILE__) . '/lib/mysql.php');

$matches = [];
preg_match('/^\/(.*)(\?.*)$/', $_SERVER['REQUEST_URI'], $matches);
$controller = $matches[1];

switch ($controller)
{
	case 'init':
		include(dirname(__FILE__) . '/controllers/init.php');
		break;
	case 'typechange':
		include(dirname(__FILE__) . '/controllers/typechange.php');
		break;
	default:
		include(dirname(__FILE__) . '/controllers/index.php');
}