<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once(dirname(__FILE__) . '/lib/auth.php');
require_once(dirname(__FILE__) . '/lib/mysql.php');

$matches = [];
preg_match('/^\/([^\?]*)(\?.*)?$/', $_SERVER['REQUEST_URI'], $matches);
$controller = $matches[1];

if ($user === null)
{
	if ($controller == 'tokensignin')
	{
		include(dirname(__FILE__) . '/controllers/auth.php');
	}
	else
	{
		include(dirname(__FILE__) . '/controllers/login.php');
	}
}
else
{
	switch ($controller)
	{
		case 'init':
			include(dirname(__FILE__) . '/controllers/init.php');
			break;
		case 'typechange':
			include(dirname(__FILE__) . '/controllers/typechange.php');
			break;
		case 'menu':
			include(dirname(__FILE__) . '/controllers/menu.php');
			break;
		case 'order':
			include(dirname(__FILE__) . '/controllers/order.php');
			break;
		default:
			include(dirname(__FILE__) . '/controllers/index.php');
	}
}
