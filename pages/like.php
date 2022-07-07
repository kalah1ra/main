<?php
session_start();
require_once('../include/header.php');
require_once('../include/db_connect.php');

if (!empty($_SESSION['id'])) {
    $getPics = $connect->prepare("SELECT * FROM `favorites` INNER JOIN pictures on favorites.pic_id = pictures.id WHERE user_id = ?");
    $getPics->execute([$_SESSION['id']]);
    $getPic = $getPics->fetchAll(PDO::FETCH_ASSOC);
}
?>
    <link href="/css/style.css" rel="stylesheet">
    <div class="content">
        <h1>Избранное</h1>
        <?php
        if (empty($_SESSION['id'])) {
            ?>
            <p>Сначала авторизируйтесь.</p>
            <?php
        } elseif (empty($getPic)) {
            echo "<p style='margin-left: auto; margin-right: auto;'> В избранном ничего нет! </p><br>";
        } else {
            echo "<div style='width: 200px;margin-left: auto;margin-right: auto;'>
<a href='/services/dellikes.php'><input class='sub' type='submit' value='Очистить избранное'></a></div><br>
<div class='wrap'>";
            foreach ($getPic as $fav) {
                ?>
                <div class='img_cont'>
                    <img alt='Its image' id='<?php echo $fav['id'] ?>' src='<?php echo $fav['name'] ?>'
                         class='images'/>
                    <a href='/services/dellike.php?id=<?php echo $fav['fav_id'] ?>'><input class='sub' type='submit'
                                                                                           value='Удалить из избранного'></a>
                </div>
                <?php
            };
        }
        ?>
    </div>
    <!--        скрипт, чтобы при клике на картинку, открывалась страница с картинкой-->
    <script>
        const t = document.querySelectorAll('.images');
        t.forEach((el) => {
            el.addEventListener('click', (e) => {
                location.href = (`/pages/img.php?p=${e.target.id}`);
            })
        })
    </script>
<?php require_once('../include/footer.php');
