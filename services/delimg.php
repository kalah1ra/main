<?php
require_once('../include/db_connect.php');
$id = $_POST['asdf'];
$filename = $_POST['zxcv'];

unlink($filename);
$result = $connect->prepare("DELETE FROM `pictures` WHERE `id` = ? ");
$result->execute(array($id));

header('Location: /pages/lk.php');
