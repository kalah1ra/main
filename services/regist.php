<?php
session_start();
require_once ('../include/db_connect.php');

$t = json_decode(file_get_contents("php://input"));
$login = filter_var(trim($t->login), FILTER_SANITIZE_STRING);
$password = filter_var(trim($t->password), FILTER_SANITIZE_STRING);
$email = filter_var(trim($t->email), FILTER_SANITIZE_STRING);

if (mb_strlen($login) <= 5 || mb_strlen($login) >= 90) {
    http_response_code(401);
    echo json_encode(['msg'=>'Недопустимая длина логина']);
    exit();
}

$password = md5($password);
$result = $connect->prepare("SELECT * FROM `users` WHERE `login` = ? ");
$result->execute([$login]);
$user = $result->fetchAll(PDO::FETCH_ASSOC);

if (!empty($user)) {
    http_response_code(401);
    echo json_encode(['msg'=>'Данный логин уже используется!']);
    exit();
}
$res = $connect->prepare("SELECT * FROM `users` WHERE `email` = ? ");
$res->execute([$email]);
$users = $res->fetchAll(PDO::FETCH_ASSOC);

if (!empty($users)) {
    http_response_code(401);
    echo json_encode(['msg'=>'Данный email уже используется!']);
    exit();
}

$uio = $connect->prepare("INSERT INTO `users` (`login`,`email`,`password`) VALUES (?,?,?)");
$uio->execute(array($login,$email, $password));
$_SESSION["login"] = $login;
$_SESSION["id"] = $user[$connect->lastInsertId()];
http_response_code(200);
echo json_encode(['msg'=>'Успешно']);

