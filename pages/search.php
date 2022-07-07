<?php
session_start();
require_once('../include/header.php');
$search = $_POST['search'];
?>
<link href="/css/style.css" rel="stylesheet">
<!--блок с картинками-->
<main class="layout-dynamic">
    <h1>Результат поиска:</h1>
    <div class="bar-pics">
        <!--        вывод картинок из БД-->
        <?php
        $result = $connect->prepare("SELECT * FROM `pictures` WHERE status = '1' AND description LIKE '%$search%'");
        $result->execute();
        $desc = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($desc as $value){
            echo "
<img alt='${value['description']}' title='${value['description']}' id='${value['id']}' src='../${value['name']}'  class='images'>";
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
