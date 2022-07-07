<?php
require_once('../include/header.php');
?>
<link href="/css/style.css" rel="stylesheet">
<h1>Обои на телефон</h1>
<div class="bar-pics">
    <?php
    $result = $connect->prepare("SELECT * FROM `pictures` WHERE section_id = '2' AND status = '1'");
    $result->execute();
    $users = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $row) {
        echo "<img id='${row['id']}' src='${row['name']}'  class='images' >";
    }
    ?>
</div>
<script>
    const t = document.querySelectorAll('.images');
    t.forEach((el)=> {
        el.addEventListener('click', (e)=> { location.href = (`/pages/img.php?p=${e.target.id}`);

        })
    })
</script>
</div>
<?php
require_once('../include/footer.php');
?>
