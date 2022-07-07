<?php
session_start();
require_once('../include/db_connect.php');
$t = json_decode(file_get_contents("php://input"));
$login = filter_var($t->login, FILTER_SANITIZE_STRING);
$password = md5(filter_var($t->password, FILTER_SANITIZE_STRING));

$result = $connect->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
$result->execute(array($login, $password));
$user = $result->fetch();
if (empty($user)) {
    http_response_code(401);
    echo json_encode(['msg' => 'Неверный логин или пароль']);
    exit();
} else {
    http_response_code(200);
    echo json_encode(['msg' => 'Успешно']);
}

$_SESSION["login"] = $login;
$_SESSION["role"] = $user["role"];
$_SESSION["id"] = $user["id"];




