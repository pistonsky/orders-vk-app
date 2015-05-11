<?php

require_once('lib/auth.php');
require_once('lib/mysql.php');

switch ($_SERVER['REQUEST_URI'])
{
	case '/init':
		include('controllers/init.php');
		break;
	default:
		include('controllers/index.php');
}