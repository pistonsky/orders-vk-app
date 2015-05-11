<?php

if ($user['type'] === null) // user has no type yet - new user
{
	$content = require(dirname(__FILE__) . '/../views/new.php');
}
if ($user['type'] === 0)
{
	$content = require(dirname(__FILE__) . '/../views/jobcreator');
}
if ($user['type'] === 1)
{
	$content = require(dirname(__FILE__) . '/../views/performer');
}

include(dirname(__FILE__) . '/../views/layouts/iframe.php');