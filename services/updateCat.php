<?php
session_start();
require_once ('../include/db_connect.php');
if (empty($_POST['name'])) {
  echo 'Укажите название категории.';
  exit();
}
if (empty($_POST['id'])) {
  echo 'Укажите id категории.';
  exit();
}

$getCat = $connect -> prepare("SELECT * FROM `categories` WHERE id = ?");
$getCat -> execute([$_POST['id']]);

if(empty($getCat->fetch(PDO::FETCH_ASSOC))){
  echo 'Категория не найдена.';
  exit();
}


$getCat = $connect -> prepare("SELECT * FROM `categories` WHERE name = ?");
$getCat -> execute([$_POST['name']]);

if(!empty($getCat->fetch(PDO::FETCH_ASSOC))){
  echo 'Категория с указанным названием уже существует.';
  exit();
}

$createCat = $connect -> prepare("UPDATE `categories` SET `name`=? WHERE id=?");
$createCat -> execute([$_POST['name'], $_POST['id']]);
header('location: /pages/lk.php');
?>