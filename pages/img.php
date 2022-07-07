<?php
session_start();
require_once('../include/header.php');

function getUrlQuery($url, $key = null)
{
    $parts = parse_url($url);
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $query);
        if (is_null($key)) {
            return $query;
        } elseif (isset($query[$key])) {
            return $query[$key];
        }
    }
    return false;
}
$p = getUrlQuery($_SERVER['REQUEST_URI'])['p'];


$result = $connect->prepare("SELECT *, pictures.name as pic_name, categories.name as cat_name FROM pictures INNER JOIN categories ON cat_id = categories.id where pictures.id = ?");
$result->execute([$_GET['p']]);
$users = $result->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_SESSION['login'])) {
    $stmt = $connect->prepare("SELECT * FROM `favorites` WHERE user_id = ? and pic_id = ?");
    $stmt->execute([$_SESSION['id'], $_GET['p']]);
    $getFav = $stmt->fetch(PDO::FETCH_ASSOC);
}
foreach ($users as $row) {
    ?>
    <link href="/css/style.css" rel="stylesheet">
    <div class="div-center">
    <?php
    if (!empty($_SESSION['login'])) {
        if ($_SESSION['role'] == 1) {
            $bar_pics = '
            <div class="bar-pic">
                <img   src="' . $row['pic_name'] . '"  class="image">
                </div>
            <div class="like">
                <p><b>' . $row['description'] . '</b></p>
                <p>Категория: ' . $row['cat_name'] . '</p>
                <p>Загрузил(а): <a href="public.php?login='.$row['user_login'].'">  ' . $row['user_login'] . ' </a></p>
                <a href="../services/addlike.php?id=' . $p . '"><input type="submit" value="Добавить в избранное" class="add_button"></a>
                <br>
                <a href="/' . $row['pic_name'] . '" download><input type="submit" value="Скачать" class="add_button"></a>
                <a href="' . $row['pic_name'] . '">
                    <input type="submit" value="Открыть оригинал" class="add_button">
                </a>
                </div>
                
            ';
        }elseif(!empty($getFav)) {
            $bar_pics = '
                <div class="bar-pic">
                <img  src="' . $row['pic_name'] . '"  class="image">
                </div>
                <div class="like">
                <p><b>' . $row['description'] . '</b></p>
                <p>Категория: ' . $row['cat_name'] . '</p>
                <p>Загрузил(а):<a href="public.php?login='.$row['user_login'].'"> ' . $row['user_login'] . ' </a></p>
                <a href="../services/dellike.php?id=' . $getFav['fav_id'] . '">
                <input type="submit" value="Удалить из избранного" class="add_button"></a><br>
                <a href="/' . $row['pic_name'] . '" download><input type="submit" value="Скачать" class="add_button"></a>
                <a href="' . $row['pic_name'] . '" target="_blank">
                    <input type="submit" value="Открыть оригинал" class="add_button">
                </a>
                </div>
                
            ';
        } else {
            $bar_pics = '
            <div class="bar-pic">
                <img  src="' . $row['pic_name'] . '"  class="image">
                </div>
            <div class="like">
                <p><b>' . $row['description'] . '</b></p>
                <p>Категория: ' . $row['cat_name'] . '</p>
                <p>Загрузил(а): <a href="public.php?login='.$row['user_login'].'"> ' . $row['user_login'] . ' </a> </p>
                <a href="../services/addlike.php?id=' . $p . '">
                <input type="submit" value="Добавить в избранное" class="add_button"></a><br>
                <a href="' . $row['pic_name'] . '" download>
                    <input type="submit" value="Скачать" class="add_button">
                </a>
                <a href="' . $row['pic_name'] . '" target="_blank">
                    <input type="submit" value="Открыть оригинал" class="add_button">
                </a>
                </div>
                
            ';
        }
    } else {
        $bar_pics = '<div class="bar-pic">
            <img  src="' . $row['pic_name'] . '"  class="image">
            </div>
            <div class="like">
            <h1><b>Авторизуйтесь,</b> чтобы добавлять картинки в избранное.</h1>
             <p><b>' . $row['description'] . '</b></p>
                <p>Категория: ' . $row['cat_name'] . '</p>
                <p>Загрузил(а): <a href="public.php?login='.$row['user_login'].'"> ' . $row['user_login'] . ' </a></p>
                <a href="' . $row['pic_name'] . '" download>
                    <input type="submit" value="Скачать" class="add_button">
                </a>
                <a href="' . $row['pic_name'] . '" target="_blank">
                    <input type="submit" value="Открыть оригинал" class="add_button">
                </a>
            </div>
            
        ';
    }
    echo $bar_pics;
}
?>
    </div>
<?php
require_once('../include/footer.php');
?>