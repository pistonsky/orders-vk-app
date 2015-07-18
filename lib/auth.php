<?php
require_once(dirname(__FILE__) . '/mysql.php');
require_once(dirname(__FILE__) . '/params.php');

if (!isset($_COOKIE['google_token']))
{
	$user = null;
}
else
{
	$google_token_id = $_COOKIE['google_token'];

	// google auth procedure
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, GOOGLE_OAUTH_URL.$google_token_id);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$google_response = json_decode(curl_exec($ch));
	curl_close($ch);

	if (!isset($google_response->name))
	{
		header(401, 'Not Authorized');
		exit;
	}
	else
	{
		$user_name = $google_response->name;
		$user_email = $google_response->email;
		$sql = 'SELECT * FROM `users` WHERE `id`=\'' . $user_email . '\' LIMIT 1';
		if ($q = mysqli_query($users_db, $sql))
		{
			// user already exists
			$user = mysqli_fetch_assoc($q);
		} else {
			// there is no such user - this is the first launch
			$user = [
				'id' => $user_email,
				'type' => null,
				'name' => $user_name,
				'photo_url' => null,
				'money' => 0
			];
			mysqli_query($users_db, "INSERT INTO `users` (`id`, `type`, `name`, `photo_url`, `money`) VALUES ('$user_email', NULL, '$user_name', NULL, '0.00');");
		}
	}
}
