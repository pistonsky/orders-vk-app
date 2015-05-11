<?php

if ($user['type'] === null) // user has no type yet - new user
{
	ob_start();
	require(dirname(__FILE__) . '/../views/new.php');
	$content = ob_get_clean();
}
if ($user['type'] === 0)
{
	ob_start();
	require(dirname(__FILE__) . '/../views/jobcreator');
	$content = ob_get_clean();
}
if ($user['type'] === 1)
{
	ob_start();
	require(dirname(__FILE__) . '/../views/performer');
	$content = ob_get_clean();
}

include(dirname(__FILE__) . '/../views/layouts/iframe.php');