<?php

$users_db = mysqli_connect("mysql87.1gb.ru","gb_orders1","e352792dyzx","gb_orders1");
if (!$users_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($users_db, 'SET NAMES utf8');

$orders_db = mysqli_connect("mysql87.1gb.ru","gb_orders2","za84ededawps","gb_orders2");
if (!$orders_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($orders_db, 'SET NAMES utf8');

$menu_db = mysqli_connect("mysql87.1gb.ru","gb_orders2","za84ededawps","gb_orders2");
if (!$menu_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($menu_db, 'SET NAMES utf8');
