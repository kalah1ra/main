<?php
$connect = new PDO(
    'mysql:dbname=ppics;host=localhost',
    'root',
    'root',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
