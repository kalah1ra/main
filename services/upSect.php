<?php
session_start();
require_once ('../include/db_connect.php');
if (empty($_POST['name'])) {
    echo 'Укажите название раздела.';
    exit();
}
if (empty($_POST['id'])) {
    echo 'Укажите id раздела.';
    exit();
}

$getCat = $connect -> prepare("SELECT * FROM `sections` WHERE id = ?");
$getCat -> execute([$_POST['id']]);

if(empty($getCat->fetch(PDO::FETCH_ASSOC))){
    echo 'Раздел не найден.';
    exit();
}


$getCat = $connect -> prepare("SELECT * FROM `sections` WHERE name = ?");
$getCat -> execute([$_POST['name']]);

if(!empty($getCat->fetch(PDO::FETCH_ASSOC))){
    echo 'Раздел с указанным названием уже существует.';
    exit();
}

$createCat = $connect -> prepare("UPDATE `sections` SET `name`=? WHERE id=?");
$createCat -> execute([$_POST['name'], $_POST['id']]);
header('location: /pages/lk.php');

