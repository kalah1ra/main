<?php
require_once ('../include/db_connect.php');
$id = $_POST['asdf'];

$result = $connect->prepare("UPDATE `pictures` SET status = '2' WHERE `id` = ?");
$result->execute(array($id));
header('Location: /pages/lk.php');
