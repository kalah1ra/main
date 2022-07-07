<?php
session_start();
require_once('../include/db_connect.php');
$id = filter_var($_POST['id']);

$getCat = $connect->prepare("UPDATE `pictures` SET section_id =? WHERE id = ?");
$getCat->execute([$_POST['section'], $_POST['id']]);
header('Location: ../pages/pic.php?p=' . $id . '');