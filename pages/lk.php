<?php
session_start();
require_once('../include/header.php');
require_once('../include/db_connect.php');
?>
    <link href="/css/style.css" rel="stylesheet">
<?php
if ($_SESSION['login'] == true) {
    if ($_SESSION['id'] == 1) {
        echo '<p style="margin-top: 20px;">Ваш логин <b> ' . $_SESSION['login'] . ' </b></p>
<div class="minimenu"><a href="#add">Добавление картинки</a><a href="#cat">Категории</a><a href="#a">Обработка</a><a href="#b">Опубликовано</a> <a href="#c">Снято</a></div>
'; ?>
        <div class="add" >
            <form method="post" enctype="multipart/form-data" action="/services/addimg.php">
                <h1 id="add">Добавление картинки</h1>
                <p>Раздел: </p>
                <select style="width: 100%;" name="section">
                    <?php
                    $getSec = $connect->prepare('SELECT * FROM `sections`');
                    $getSec->execute();
                    foreach ($getSec as $key => $value) {
                        ?>
                        <option value='<?php echo $value['id'] ?>'><?php echo $value['name'] ?></option>
                        <?php
                    } ?>
                </select>
                <br>
                <p>Категории:</p>
                <select style="width: 100%;" name="category">
                    <?php foreach ($categories as $key => $value) {
                        ?>
                        <option value='<?php echo $value['id'] ?>'><?php echo $value['name'] ?></option>
                        <?php
                    } ?>
                </select>
                <br>
                <label >Описание
                    <input type="text" name="description" required>
                </label>
                <br>
                <label > Нажмите сюда, чтобы загрузить картинку</label> <br>
                <input type="file" name="photo" id="photo" accept="image/*" required>
                <br>
                <input type="submit" value="Добавить" class="add_button">
            </form>
        </div><hr>
        <?php
        echo '
<div class="category">
    <h1>Добавление категорий</h1>
    <form action="/services/addcat.php" method="POST">
    <label>Название категории</label>
    <input type="text" name="name">
    <input class="sub" type="submit" value="Добавить"><br>
</form>
</div><hr>
<h1 id="cat">Категории</h1>
<div class="panel">';
        $getCat = $connect->prepare('SELECT * FROM `categories`');
        $getCat->execute();
        foreach ($getCat as $key => $value) {
            echo '
    <div class="panel-pic">
        <p>' . $value['name'] . '</p>
        <form action="/services/updateCat.php" method="post">
            <input type="text" name="name" value="' . $value['name'] . '">
            <input type="hidden" name="id" value="' . $value['id'] . '">
            <input class="sub" type="submit" value="Редактировать">
        </form>
        <br>
        <form action="/services/delcat.php" method="get">
            <input class="sub" type="submit" value="Удалить">
            <input type="text" style="display: none" name="id" value="' . $value['id'] . '">
        </form><br>
    </div>
    ';

        }

        echo "</div><hr>";
        $result = $connect->prepare("SELECT * FROM `pictures` WHERE status = '0'");
        $result->execute();
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
        $res = $connect->prepare("SELECT * FROM `pictures` WHERE status = '1'");
        $res->execute();
        $pub = $res->fetchAll(PDO::FETCH_ASSOC);
        $ress = $connect->prepare("SELECT * FROM `pictures` WHERE status = '2'");
        $ress->execute();
        $cancel = $ress->fetchAll(PDO::FETCH_ASSOC);
        echo '<h1 id="a">Обработка заявок</h1><div class="panel">';
        foreach ($users as $row) {
            echo '<div class="panel-pic">
<p> Пользователь ' . $row['user_login'] . ' </p>

    <img id="' . $row['id'] . '"  src="' . $row['name'] . '" class="images" >
    <form action="/services/upimg.php" method="post"><input class="sub" type="submit" value="Опубликовать">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '"></form><br>
   <form action="/services/cancerimg.php" method="post"><input class="sub" type="submit" value="Отмена публикации">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '"></form><br>
    <form action="/services/delimg.php" method="post"><input class="sub" type="submit" value="Удалить">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '">
    <input type="text" style="display: none" name="zxcv" value="' . $row['name'] . '"></form><br>
        </div>
        
        
        ';
        }
        echo '</div><hr>';

        echo '<h1 id="b">Опубликовано</h1><div class="panel">';
        foreach ($pub as $row) {
            echo '<div class="panel-pic">
<p> Пользователь ' . $row['user_login'] . ' </p>

    <img id="' . $row['id'] . '"  src="' . $row['name'] . '"   class="images" >
    <form action="/services/cancerimg.php" method="post"><input class="sub" type="submit" value="Снять с публикации">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '"></form><br>
    <form action="/services/delimg.php" method="post"><input class="sub" type="submit" value="Удалить">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '">
    <input type="text" style="display: none" name="zxcv" value="' . $row['name'] . '">
    </form><br>
        </div>
        ';
        }
        echo '</div><hr>';

        echo ' <h1 id="c">Снято с публикации</h1><div class="panel">';
        foreach ($cancel as $row) {
            echo '<div class="panel-pic">
<p> Пользователь ' . $row['user_login'] . ' </p>
    <img id="' . $row['id'] . '" src="' . $row['name'] . '"  class="images" >
    <form action="/services/upimg.php" method="post"><input class="sub" type="submit" value="Опубликовать">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '"></form><br>
    <form action="/services/delimg.php" method="post"><input class="sub" type="submit" value="Удалить">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '">
    <input type="text" style="display: none" name="zxcv" value="' . $row['name'] . '"></form><br>
        </div>
        ';
        }
        echo '</div>'; ?>
        <!--        скрипт, чтобы при клике на картинку, открывалась страница с картинкой-->
        <script>
            const t = document.querySelectorAll('.images');
            t.forEach((el) => {
                el.addEventListener('click', (e) => {
                    location.href = (`/pages/pic.php?p=${e.target.id}`);
                })
            })
        </script>
        <?php
    } else {
        $stmt = $connect->prepare("SELECT * FROM `categories`");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<p> Ваш логин: <b>' . $_SESSION['login'] . '</b></p>';
        ?>
        <div class="add" >
            <form method="post" enctype="multipart/form-data" action="/services/addimg.php">
                <h1 id="add">Добавление картинки</h1>
                <p>Выберите раздел (Если не один раздел не подходит, выберите "Красивые")</p>
                <select style="width: 100%;" name="section">
                    <?php
                    $getSec = $connect->prepare('SELECT * FROM `sections`');
                    $getSec->execute();
                    foreach ($getSec as $key => $value) {
                        ?>
                        <option value='<?php echo $value['id'] ?>'><?php echo $value['name'] ?></option>
                        <?php
                    } ?>
                </select>
                <p></p>
                <p>Выберите категорию (Если не одна категория не подходит, выберите "Разное")</p>
                <select style="width: 100%;" name="category">
                    <?php foreach ($categories as $key => $value) {
                        ?>
                        <option value='<?php echo $value['id'] ?>'><?php echo $value['name'] ?></option>
                        <?php
                    } ?>
                </select>
                <p></p>
                <p>Напишите краткое описание картинки</p>
                <input type="text" name="description" required>

                <p> Нажмите сюда, чтобы загрузить картинку</p>
                <input type="file" name="photo" id="photo" accept="image/*" required>
                <p></p>
                <input type="submit" value="Подать заявку" class="add_button">
            </form>
        </div>
        <br>
        <?php
        ;
        echo '
<h1>Ваши заявки на публикацию</h1>
<div class="panel">
';
        $bid = $connect->prepare("SELECT * FROM `pictures` WHERE user_login = ? AND status = '0'");
        $bid->execute(array($_SESSION['login']));
        $app = $bid->fetchAll(PDO::FETCH_ASSOC);
        foreach ($app as $row) {
            echo '<div class="panel-pic">';
            echo "<img alt='${row['description']}' title='${row['description']}' id='${row['id']}' src='${row['name']}'  class='images'>";
            echo '<form action="/services/delimg.php" method="post"><input class="sub" type="submit" value="Удалить">
    <input type="text" style="display: none" name="asdf" value="' . $row['id'] . '">
    <input type="text" style="display: none" name="zxcv" value="' . $row['name'] . '">
    </form><br>';
            echo '</div>';

        }
        echo '</div>';
    }
}
?>
<?php
require_once('../include/footer.php');
?>