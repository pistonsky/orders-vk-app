<?php

if ($user['type'] === null) // user has no type yet - new user
{
	$content = require('../views/new.php');
}
if ($user['type'] === 0)
{
	$content = require('../views/jobcreator');
}
if ($user['type'] === 1)
{
	$content = require('../views/performer');
}

include('../views/layouts/iframe.php');