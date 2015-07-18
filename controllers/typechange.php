<?php

$type = $_GET['type'];

mysqli_query($users_db, "UPDATE `users` SET `type`=$type WHERE `id`='$user_email'");
