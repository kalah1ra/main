<?php
session_start();
require_once ('../include/db_connect.php');

if (empty($_POST['name'])) {
  echo 'Укажите название категории.';
  exit();
}

$getCat = $connect -> prepare("SELECT * FROM `categories` WHERE name = ?");
$getCat -> execute([$_POST['name']]);

if(!empty($getCat->fetch(PDO::FETCH_ASSOC))){
  echo 'Уже добавлено.';
  exit();
}

$createCat = $connect -> prepare("INSERT INTO `categories`(name) VALUES (?)");
$createCat -> execute([$_POST['name']]);
echo "<script>document.location.href = '/pages/lk.php".$_GET['id']."';</script>";