<?php
session_start();
require_once('../include/header.php');
if ($_SESSION['login'] == true && $_SESSION['id'] == 1) {

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
foreach ($users

         as $row) {
?>
<link href="/css/style.css" rel="stylesheet">
<div class="div-center">
    <?php
    echo '<div class="bar-pic">
            <img  src="' . $row['pic_name'] . '"  class="image">
            </div>
            <div class="like">
            
             <p><b>' . $row['description'] . '</b></p>
             <form action="/services/updateDesc.php" method="post">
             <input type="text" name="description" value="' . $row['description'] . '">'; ?>
    <input type="hidden" name="id" value="<?php echo $_GET['p'] ?>">
    <input class="sub" type="submit" value="Обновить">
    <?php echo '
</form>
              <p>Категория: ' . $row['cat_name'] . '</p>'; ?>
    <form action="/services/updateCatPic.php" method="post">
        <select style="width: 100%;" name="category">
            <?php
            $stmt = $connect->prepare("SELECT * FROM `categories`");
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $key => $value) {
                ?>
                <option value='<?php echo $value['id'] ?>'><?php echo $value['name'] ?></option>
                <?php
            } ?>
        </select>
        <input type="hidden" name="id" value="<?php echo $_GET['p'] ?>">
        <p></p>
        <?php echo '
<input class="sub" type="submit" value="Редактировать">
        </form>
        <p>Поменять раздел:';
        $getSec = $connect->prepare('SELECT *, sections.name as sec_name FROM pictures INNER JOIN sections ON section_id = sections.id WHERE pictures.id = ?');
        $getSec->execute([$_GET['p']]);
        $sect = $getSec->fetchAll(PDO::FETCH_ASSOC);
        foreach ($sect as $value) {
            echo '(' . $value['sec_name'] . ')</p>';
        } ?>
        <form action="/services/updateSec.php" method="post">
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
            <input type="hidden" name="id" value="<?php echo $_GET['p'] ?>">
            <p></p>
            <?php echo '
<input class="sub" type="submit" value="Редактировать">
        </form>
                <p>Загрузил(а): ' . $row['user_login'] . ' </p>
                
                <a href="' . $row['pic_name'] . '" target="_blank">
                    <input type="submit" value="Открыть оригинал" class="add_button">
                </a>
            </div>
            
        ';
            }
            } else {
                ?>
                <script>location.href = (`/`);</script> <?php
            }
            ?>
</div>
<?php
require_once('../include/footer.php');
?>
