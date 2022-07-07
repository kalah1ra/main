<?php
session_start();
require_once('../include/db_connect.php');
require_once('../include/header.php');
$search = $_GET['id'];
if (!empty($_GET['id'])) {
    $stmt = $connect->prepare("SELECT * FROM pictures WHERE cat_id = ? AND status = '1'");
    $stmt->execute([$_GET['id']]);
    $pictures = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<link href="/css/style.css" rel="stylesheet">
<!--блок с картинками-->
<main class="layout-dynamic">
    <?php
    $getPic = $connect->prepare("SELECT * FROM `categories` WHERE id = ?");
    $getPic->execute([$_GET['id']]);
    $getCat = $getPic->fetchAll(PDO::FETCH_ASSOC);
    foreach ($getCat as $row) {
        echo '<h1>' . $row['name'] . '</h1>';
    }
    ?>
    <div class="bar-pics">
        <!--        вывод картинок из БД-->
        <?php

        if (!empty($_GET['id']) && !empty($pictures)) {
            foreach ($pictures as $value) {
                echo "<img alt='${value['description']}' title='${value['description']}' id='${value['id']}' src='../${value['name']}'  class='images'>";
            }
        } else {
            ?>
            <p>Категория не найдена</p>
            <?php
        }
        ?>
        <!--        скрипт, чтобы при клике на картинку, открывалась страница с картинкой-->
        <script>
            const t = document.querySelectorAll('.images');
            t.forEach((el) => {
                el.addEventListener('click', (e) => {
                    location.href = (`/pages/img.php?p=${e.target.id}`);
                })
            })
        </script>
    </div>
</main>
<?php
require('../include/footer.php');
?>
