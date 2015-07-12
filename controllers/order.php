<?php

// create new order

$user_id = $user['id'];

if ($rows_affected = mysqli_query($orders_db, "INSERT INTO `orders` (`id`, `user_id`, `status`, `date_created`) VALUES (NULL, '$user_id', '0', CURRENT_TIMESTAMP); ") == TRUE)
{
	$order_id = mysqli_insert_id($orders_db);
	$total_rows_affected = 0;
	foreach ($_POST['items'] as $item) {
		$item_id = $item['id'];
		$item_count = $item['count'];
		if (mysqli_query($orders_db, "INSERT INTO `orders_items` (`id`, `order_id`, `menu_id`, `quantity`, `status`, `last_modified`) VALUES (NULL, '$order_id', '$item_id', '$item_count', '0', CURRENT_TIMESTAMP); ") === TRUE) {
			$total_rows_affected += mysqli_affected_rows($orders_db);
		}
	}
	if ($total_rows_affected == count($_POST['items'])) {
		header('Content-Type: text/json');
		echo json_encode([
			'success'=>true,
			'total_rows_affected'=>$total_rows_affected
		]);
	} else {
		header('Content-Type: text/json');
		echo json_encode([
			'success'=>false,
			'total_rows_affected'=>$total_rows_affected
		]);
	}
}
else
{
	header('Content-Type: text/json');
	echo json_encode([
		'success'=>false
	]);
}
