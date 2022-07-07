<div class="cookie_notice">
    <p>Этот сайт использует файлы cookies для обеспечения работоспособности и улучшения качества сайта. Продолжая
        использовать
        наш сайт, вы автоматически соглашаетесь с использованием данных технологий.</p>
    <div>
        <a class="cookie_btn" id="cookie_close" href="#close">Согласиться</a>
        <a class="cookie_btn" href="../pages/politic.php">Политика конфиденциальности</a>
    </div>
</div>
<script>
    // Проверка на чтение куки
    const getCookie = name => {
        let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    let cookiecook = getCookie("cookiecook"),
        cookiewin = document.getElementsByClassName('cookie_notice')[0];
    if (cookiecook != "no") {
        cookiewin.style.display = "block";
        document.getElementById("cookie_close").addEventListener("click", function () {
            cookiewin.style.display = "none";
            let date = new Date;
            date.setDate(date.getDate() + 10);
            document.cookie = "cookiecook=no; path=/; expires=" + date.toUTCString();
        });
    }
</script>
<script src="../js/menu.js" type="text/javascript"></script>
</body>
</html>