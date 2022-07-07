<?php
session_start();
$_SESSION["login"] = "";
$_SESSION["role"] = "";
session_destroy();
header('location: /');
