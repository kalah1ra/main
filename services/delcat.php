<?php
session_start();
require_once ('../include/db_connect.php');


if(empty($_SESSION['id'])){
    print_r('Вы не авторизированы');
    exit();
};

$id = $_GET['id'];
if(empty($id)){
    print_r('Id не указан.');
    exit();
};

$getPic = $connect->prepare("SELECT * FROM `categories` WHERE id = ?");
$getPic->execute([$_GET['id']]);

if(empty($getPic->fetch(PDO::FETCH_ASSOC))){
    print_r('Категория не найдена.');
    exit();
};

$deleteFav = $connect->prepare("DELETE FROM `categories` WHERE id = ?");
$deleteFav->execute([$_GET['id']]);

header('location: /pages/lk.php');
