<?php

$users_db = mysqli_connect("localhost","gb_orders1","e352792dyzx","gb_orders1",8889);
if (!$users_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($users_db, 'SET NAMES utf8');

$orders_db = mysqli_connect("localhost","gb_orders2","za84ededawps","gb_orders2",8889);
if (!$orders_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($orders_db, 'SET NAMES utf8');

$menu_db = mysqli_connect("localhost","gb_orders2","za84ededawps","gb_orders2",8889);
if (!$menu_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($menu_db, 'SET NAMES utf8');
