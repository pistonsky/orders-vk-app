<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
	<link rel="stylesheet" href="/css/mobi.css?v=1">
	<link rel="stylesheet" href="/css/style.css?v=1">
	<link rel="stylesheet" href="/css/jquery.dataTables.min.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:600,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<div id="page">
<body>
	<script src="/js/jquery.min.js" type="text/javascript"></script>
	<script src="/js/underscore-min.js" type="text/javascript"></script>
	<script src="/js/backbone-min.js" type="text/javascript"></script>
	<script src="//vk.com/js/api/xd_connection.js?2" type="text/javascript"></script>
	<script type="text/javascript" src="/js/openapi.js"></script>
	<script src="/js/vk.js"></script>	
	<script src="/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<?php echo $content;?>
	<script type="text/javascript">

		function adjustFrameHeight() {
			setFrameHeight($('#page').height());
		}

		function setFrameHeight(height) {
			VK.callMethod("resizeWindow", 590, height);
		}

	</script>
</body>
</div>
</html>
