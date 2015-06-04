<?php

// fetch menu
$q = mysqli_query($menu_db, 'SELECT `id`,`title`,`description`,`price`,`picture`,`enabled` FROM `menu`');
$menu = [];
while ($row = mysqli_fetch_assoc($q)) {
	$menu[] = $row;
}
header('Content-Type: text/json');
echo json_encode([
	'menu'=>$menu
]);