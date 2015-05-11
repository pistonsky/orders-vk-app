<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once(dirname(__FILE__) . '/lib/auth.php');
require_once(dirname(__FILE__) . '/lib/mysql.php');

switch ($_SERVER['REQUEST_URI'])
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