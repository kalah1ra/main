<?php
$stmt = $connect->prepare('SELECT * FROM `categories`');
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="sidepanel ssm-nav-visible" id="js-side-menu">
    <div class="sidepanel-fullsize">
        <div class="sidepanel-links">
            <ul class="reset">
                <li>
                    <a href="/" style="">
                        <img src="../img/icons/all.png" style="width: 25px; margin-right: 10px; ">
                        Все обои</a>
                </li>
                <li>
                    <a style="margin-top: 10px;" href="/pages/phone.php">
                        <img src="../img/icons/phone.png" style="width: 25px;margin-right: 10px; ">
                        Телефон</a>
                </li>
                <li>
                    <a style="margin-top: 10px;" href="../pages/comp.php">
                        <img src="../img/icons/comp.png" style="width: 25px;margin-right: 10px; ">
                        Рабочий стол </a>
                </li>
                <li>
                    <a style="margin-top: 10px;" href="../pages/krasivoe.php">
                        <img src="../img/icons/krasivoe.png" style="width: 25px;margin-right: 10px; ">
                        Красивые картинки </a>
                </li>
                <hr>
                <li>
                    <p class="cat_menu">Категории</p>
                </li>
                <?php
                foreach ($categories as $category) {
                    ?>
                    <li>
                        <a href="/pages/categories.php?id=<?php echo $category['id'] ?>"
                           style=""><?php echo $category['name'] ?></a>
                    </li>
                    <?php
                }
                ?>
                <hr>
                <li>
                    <a href="/pages/support.php">Поддержка</a>
                </li>
                <li>
                    <a href="/pages/soglasie.php">Конфиденциальность</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidepanel-shortsize">
        <ul class="sidepanel-shortnav list-unstyled">
            <li>
                <a class="sidepanel-shortnav__item" href="/">
                    <img src="../img/icons/all.png" style="width: 25px; ">
                </a>
            </li>
            <li class="">
                <a class="sidepanel-shortnav__item"
                   href="../pages/phone.php">
                    <img src="../img/icons/phone.png" style="width: 25px; ">
                </a>
            </li>
            <li class="">
                <a class="sidepanel-shortnav__item"
                   href="../pages/comp.php">
                    <img src="../img/icons/comp.png" style="width: 25px; ">
                </a>
            </li>
            <li class="">
                <a class="sidepanel-shortnav__item"
                   href="../pages/krasivoe.php">
                    <img src="../img/icons/krasivoe.png" style="width: 25px; ">
                </a>
            </li>
    </div>
</div>