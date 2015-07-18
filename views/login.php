<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="google-signin-client_id" content="768865337537-qe7evr393s4qri88ubmke022dtgtm5bs.apps.googleusercontent.com">
	<link rel="stylesheet" href="/css/style.css?v=1">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:600,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<!-- Google Platform Library -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script type="text/javascript">
		window.onSignIn = function(googleUser) {
			var profile = googleUser.getBasicProfile();
			var id_token = googleUser.getAuthResponse().id_token;
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '/tokensignin');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				window.location = "/";
			};
			xhr.send('token='+id_token);
		};
	</script>
</head>
<div id="page">
<body>
<div class="overlay">
  <div class="g-signin2 centered" data-onsuccess="onSignIn"></div>
</div>
</body>
</div>
</html>
