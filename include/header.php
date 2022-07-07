<?php
require_once('db_connect.php');
?>
<!doctype html>
<html class="is-navOpen" data-theme="theme-dark" lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/css/style.css" rel="stylesheet">
    <title>Planet of pictures - фотохостинг</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body id="App" class="is-main">
<header>
    <div class="header__container container container_width_wide">
        <ul class="menu">
            <li class="head">
                <button class="sidepanel-toggle ssm-toggle-nav" type="button" style="margin: 7px;">
                    <img src="/img/icons/menu.png"
                         style="margin: auto 0;width: 25px; height: 25px; " alt="">
                </button>
                <div class="logo"><a href="/">
                        <!--                    <img class="logo" src="/logo/logo.png"-->
                        <!--                         style="" alt="">-->
                        PLANET OF PICTURES</a>
                </div>
            </li>
        </ul>
        <div class="bar-search">
            <form class='bar-search__form' action="/pages/search.php" method="post">
                <input class="search" name="search" type="search" placeholder="Поиск" style="margin: 10px;">
                <input type="submit" value="" class="bar-search__btn"></form>
        </div>
        <div class="theme-switch">
            <label type="button" class="theme-switch__toggle">
                <input type="checkbox" class="theme-switch__input theme-changer" checked>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14">
                <path d="M11.7 10.4c-4.1 0-7.4-3.2-7.4-7.2 0-1.1.3-2.2.8-3.2C2.1.9 0 3.6 0 6.8c0 4 3.3 7.2 7.4 7.2 2.9 0 5.4-1.6 6.6-3.9-.8.2-1.5.3-2.3.3z"/></svg>Светлая тема</span>
            </label>
        </div>
        <?php
        if (!empty($_SESSION['login'])) {
            if ($_SESSION['role'] == 1) {
                $menu =
                    '
                <div class="bar-user">
                    <ul class="menu-list">
                        <li style="margin-left: auto; display: inline; text-decoration: none; float: right;  margin-top: 50px; color: white;">
                            <a href="/services/logout.php"><b>Выход</b></a></li>
                        <li>
                            <a class="bar-user__item" href="/pages/lk.php">
                                <img class="bar-user__image" src="/img/icons/user.png" alt="Not logged in"
                                     style="margin-right: 20px; ">
                            </a>
                        </li>
                    </ul>
                </div>
                ';
            } else {
                $menu =
                    '
                <div class="bar-user">
                    <ul class="menu-list">
                        <li>
                            <a href="/pages/like.php">
                                <img class="bar-user__love" src="/img/icons/love.png" style="margin-top: 20px; "></a>
                        </li>
                        <li style="margin-left: auto; display: inline; text-decoration: none; float: right; margin-right: 20px; margin-top: 25px; color: white;">
                            <a href="/services/logout.php"><b>Выход</b></a></li>
                        <li>
                            <a class="bar-user__item" href="/pages/lk.php">
                                <img class="bar-user__image" src="/img/icons/user.png" alt="Not logged in"
                                     style="margin-right: 20px; ">
                            </a>
                        </li>
                    </ul>
                </div>
                 ';
            }
        } else {
            $menu = '
                <div class="bar-user">
                    <ul class="menu-list">
                        <li>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                <img class="bar-user__image" src="/img/icons/user.png" alt="Not logged in">
                            </button>
                        </li>
                    </ul>
                </div>
                 ';
        }
        echo $menu;
        ?>
    </div>
</header>
<a href="#" class="scrollup">Наверх</a>
<?php
require_once('menu.php');
require_once('forms.php');
?>

