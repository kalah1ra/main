<link rel="stylesheet" href="/css/style.css">
<div class="fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div id="auth" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Авторизация</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id='auth_form' class="auth">
                    <p>Авторизуйтесь, чтобы войти в личный кабинет и добавлять картинки</p>
                    <label><b>Логин</b></label>
                    <input type="text" placeholder="Введите логин" name="login" required>
                    <p id='auth_err_login'></p>
                    <label><b>Пароль</b></label>
                    <input type="password" placeholder="Введите пароль" autocomplete="on" name="password" required>
                    <p id='auth_err_pass'></p>
                    <p id='auth_err'></p>
                    <input type="submit" id="btns" value="Войти">
                    <div class="containerlog">
                        <label>Нет аккаунта?
                            <input id='openModalReg' value='Регистрация' type="button" class="close"
                                   data-dismiss="modal"
                                   data-toggle='modal'
                                   data-target='#exampleModalReg' aria-label="Close"/></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="fade" id="exampleModalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div id="reg" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Регистрация</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class='reg_form' id='reg_form'>
                    <p>Зарегистрируйтесь на нашем сайте, чтобы добавлять картинки</p>
                    <label><b>Логин</b></label>
                    <input type="text" placeholder="Введите логин" name="login"  pattern="^[A-Za-z0-9-]+$"
                           required>
                    <p id="reg_form_err_login"></p>
                    <label><b>E-mail</b></label>
                    <input type="email" placeholder="Введите E-mail"  name="email" required>
                    <p id="reg_form_err_email"></p>
                    <label><b>Пароль</b></label>
                    <input type="password" placeholder="Введите пароль" autocomplete="off" minlength="6" required
                           name="password">
                    <p id="reg_form_err_pass" ></p>
                    <label><b>Повторите пароль</b></label>
                    <input type="password" placeholder="Повторите пароль" autocomplete="off" id="repassword" minlength="6" required
                           name="repassword">
                    <p id="reg_form_err_c_pass" ></p>
                    <p><input type="checkbox" required>
                        <a href="/pages/soglasie.php" target="_blank"><b>Согласие</b></a> на обработку
                        персональных данных.</p>
                    <p id="reg_form_err" ></p>
                    <input type="submit" id="btnss" value="Зарегистрироваться">
                    <div class="containereg">
                        <label> Уже есть аккаунт?
                            <input id='openModalAuth' value='Авторизация' type="button" class="close"
                                   data-dismiss="modal"
                                   data-toggle='modal'
                                   data-target='#exampleModalCenter' aria-label="Close"/></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../js/validate.js"></script>
