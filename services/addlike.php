<?php
session_start();
require_once ('../include/db_connect.php');
if (!isset($_GET['id'])) {
    echo "<script>document.location.href = '/';</script>";
}

$getPic = $connect->prepare("SELECT * FROM `favorites` WHERE user_id = ? AND pic_id = ?");
$getPic->execute([$_SESSION['id'],$_GET['id']]);
if(!empty($getPic->fetch(PDO::FETCH_ASSOC))) {
    echo 'Уже добавлено';
    exit();
}

$createPic = $connect->prepare("INSERT INTO `favorites`(`user_id`, `pic_id`) VALUES (?,?)");
$createPic->execute([$_SESSION['id'],$_GET['id']]);
echo "<script>document.location.href = '/#".$_GET['id']."';</script>";