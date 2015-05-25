<?php

$content = '';

if ($user['type'] === null) // user has no type yet - new user
{
	ob_start();
	require(dirname(__FILE__) . '/../views/new.php');
	$content = ob_get_clean();
}
else if ($user['type'] == 0)
{
	ob_start();
	ob_implicit_flush(false);
	require(dirname(__FILE__) . '/../views/admin.php');
	$content = ob_get_clean();
}
else if ($user['type'] == 1)
{
	ob_start();
	require(dirname(__FILE__) . '/../views/user.php');
	$content = ob_get_clean();
}

include(dirname(__FILE__) . '/../views/layouts/iframe.php');