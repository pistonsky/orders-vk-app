<?php

$users_db = mysqli_connect("localhost","bbqhouse","bbqhouse","bbqhouse",8889);
if (!$users_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($users_db, 'SET NAMES utf8');

$orders_db = mysqli_connect("localhost","bbqhouse","bbqhouse","bbqhouse",8889);
if (!$orders_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($orders_db, 'SET NAMES utf8');

$menu_db = mysqli_connect("localhost","bbqhouse","bbqhouse","bbqhouse",8889);
if (!$menu_db) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
mysqli_query($menu_db, 'SET NAMES utf8');
