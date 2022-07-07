<?php
session_start();
require_once('include/header.php');
?>
<link href="css/style.css" rel="stylesheet">
<main class="layout-dynamic">
    <h1><b>Planet of pictures</b> - найди картинку по душе!</h1>
    <div class="bar-pics">
        <?php
        $result = $connect->prepare("SELECT * FROM `pictures` WHERE status = '1' ORDER BY created_at DESC");
        $result->execute();
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $row) {
            echo "<img alt='${row['description']}' title='${row['description']}' id='${row['id']}' src='${row['name']}'  class='images'>";
        }
        ?>
        <script>
            const t = document.querySelectorAll('.images');
            t.forEach((el) => {
                el.addEventListener('click', (e) => { location.href = (`/pages/img.php?p=${e.target.id}`);
                })
            })
        </script>
    </div>
</main>
<?php
require_once('include/footer.php');
?>

