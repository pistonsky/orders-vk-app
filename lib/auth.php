<?php
require_once(dirname(__FILE__) . '/mysql.php');
require_once(dirname(__FILE__) . '/params.php');

if ((!isset($_GET['viewer_id'])) || (!isset($_GET['auth_key'])))
{
	header(401, 'Not Authorized');
	exit;
}
else
{
	$uid = $_GET['viewer_id'];
	$auth_key = $_GET['auth_key'];

	$true_auth_key = md5(APP_ID.'_'.$uid.'_'.APP_SECRET);

	if (($true_auth_key !== $auth_key) && ($auth_key != 'test'))
	{
		header(401, 'Not Authorized');
		exit;
	}
	else
	{
		$q = mysqli_query($users_db, 'SELECT * FROM `users` WHERE `id`=' . $uid . ' LIMIT 1');
		if (mysqli_num_rows($q) > 0) {
			// user already exists
			$user = mysqli_fetch_assoc($q);
		} else {
			// there is no such user - this is the first launch
			$user = [
				'id' => $uid,
				'type' => null,
				'name' => null,
				'photo_url' => null,
				'money' => 0
			];
			mysqli_query($users_db, "INSERT INTO `users` (`id`, `type`, `name`, `photo_url`, `money`) VALUES ('$uid', NULL, NULL, NULL, '0.00');");
		}
	}
}