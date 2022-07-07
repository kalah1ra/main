<?php
session_start();
require_once('../include/db_connect.php');
$id = filter_var($_POST['id']);

$getCat = $connect->prepare("UPDATE `pictures` SET description =? WHERE id = ?");
$getCat->execute([$_POST['description'], $_POST['id']]);
header('Location: ../pages/pic.php?p=' . $id . '');