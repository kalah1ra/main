<?php
session_start();
$id = $_GET['id'];

require_once ('../include/db_connect.php');

if(empty($_SESSION['id'])){
    print_r('Вы не авторизованы');
    exit();
};

$getPic = $connect->prepare("SELECT * FROM `favorites` where user_id = ? and fav_id = ?");
$getPic->execute([$_SESSION['id'],$_GET['id']]);
if(empty($getPic->fetch(PDO::FETCH_ASSOC))){
    print_r('Избранное не найдено.');
    exit();
};

$deleteFav = $connect->prepare("DELETE FROM `favorites` WHERE user_id = ? AND fav_id = ?");
$deleteFav->execute([$_SESSION['id'],$_GET['id']]);

header('location: /pages/like.php');
