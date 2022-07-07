<?php
session_start();
$id = $_GET['id'];

require_once('../include/db_connect.php');

if (empty($_SESSION['id'])) {
    print_r('Вы не авторизованы');
    exit();
};


$deleteFav = $connect->prepare("DELETE FROM `favorites` WHERE user_id = ?");
$deleteFav->execute([$_SESSION['id']]);

header('location: /pages/like.php');