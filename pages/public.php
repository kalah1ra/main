<?php
session_start();
require_once('../include/header.php'); ?>
<link href="/css/style.css" rel="stylesheet">
<main class="layout-dynamic">
    <h1>Публикации автора</h1>
    <div class="bar-pics">
        <?php
        $public = $connect->prepare("SELECT * FROM `pictures` WHERE user_login = ? AND status = '1'");
        $public->execute(array($_GET['login']));
        $publics = $public->fetchAll(PDO::FETCH_ASSOC);
        foreach ($publics as $row) {
            echo '<div class="panel-pic">';
            echo "<img alt='${row['description']}' title='${row['description']}' id='${row['id']}' src='${row['name']}'  class='images'>";
            echo '</div>';
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
require_once('../include/footer.php');
?>
