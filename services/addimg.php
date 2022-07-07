<?php
session_start();
require_once('../include/db_connect.php');

$category = filter_var(trim($_POST['category']), FILTER_SANITIZE_STRING);
$section = filter_var(trim($_POST['section']), FILTER_SANITIZE_STRING);
$user_login = $_SESSION["login"];
$desc = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$status = '0';
if (empty($category)) {
    echo 'Не указана категория';
    exit();
};
$stmt = $connect->prepare('SELECT * FROM `categories` where id = ?');
$stmt->execute([$_POST['category']]);
if (empty($stmt->fetchAll(PDO::FETCH_ASSOC))) {
    echo 'Категория не найдена';
    exit();
}

$name = $_FILES['photo']['name'];
$tmp_patch = $_FILES['photo']['tmp_name'];
$patch = 'img';
$patch_two = 'pics';
$full_patch = "../$patch/$patch_two/$name";
move_uploaded_file($tmp_patch, "$full_patch");
$insert_path = $connect->prepare("INSERT INTO `pictures` (name,description,section_id,status,user_login,cat_id) VALUES (?,?,?,?,?,?)");
$insert_path->execute(array($full_patch, $desc, $section, $status, $user_login, $category));
header('Location: /pages/lk.php');
