<?php

require_once(dirname(__FILE__) . '/lib/auth.php');
require_once(dirname(__FILE__) . '/lib/mysql.php');

switch ($_SERVER['REQUEST_URI'])
{
	case '/init':
		include(dirname(__FILE__) . '/controllers/init.php');
		break;
	default:
		include(dirname(__FILE__) . '/controllers/index.php');
}