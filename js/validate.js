const authErrLogin = document.getElementById('auth_err_login');
const authErrPass = document.getElementById('auth_err_pass');
const authErr = document.getElementById('auth_err');

document.getElementById("auth_form").addEventListener("submit", function (e) {
    e.preventDefault();
    authErr.innerText = "";
    let err = false;
    if (e.target.login.value.length <= 2 || e.target.login.value.length >= 45) {
        authErrLogin.innerText = 'Недопустимая длина логина';
        err = true;
    } else {
        authErrLogin.innerText = '';
    }
    if (e.target.password.value.length <= 5 || e.target.password.value.length >= 45) {
        authErrPass.innerText = 'Недопустимая длина пароля (минимум 6 символов)';
        err = true;
    } else {
        authErrPass.innerText = '';
    }
    if (!err) {
        fetch('/services/auth.php', {
            method: 'POST',
            body: JSON.stringify({
                login: e.target.login.value,
                password: e.target.password.value,
            })
        })
            .then(res => res.json())
            .then(data => {
                if (data['msg'] === 'Успешно') {
                    window.location.href = '/';
                } else {
                    authErr.innerText = data['msg'];
                }

            })
            .catch((error) => {
                authErr.innerText = error;
            });
    }
});


const regErrLogin = document.getElementById('reg_form_err_login');
const regErrEmail = document.getElementById('reg_form_err_email');
const regErrPass = document.getElementById('reg_form_err_pass');
const regErrCPass = document.getElementById('reg_form_err_c_pass');
const regErr = document.getElementById('reg_form_err');

document.getElementById("reg_form").addEventListener("submit", function (e) {
    e.preventDefault();
    regErr.innerText = "";
    let err = false;
    if (e.target.login.value.length <= 5 || e.target.login.value.length >= 90) {
        regErrLogin.innerText = 'Недопустимая длина логина';
        err = true;
    } else {
        regErrLogin.innerText = '';
    }

    if (e.target.password.value.length <= 5 || e.target.password.value.length >= 45) {
        regErrPass.innerText = 'Недопустимая длина пароля (минимум 6 символов)';
        err = true;
    } else {
        regErrPass.innerText = '';
    }

    if (e.target.email.value.length <= 8 || e.target.email.value.length >= 45) {
        regErrEmail.innerText = 'Недопустимый email';
        err = true;
    } else {
        regErrEmail.innerText = '';
    }
    if (e.target.password.value !== e.target.repassword.value) {
        regErrCPass.innerText = 'Пароли не совпадают';
        err = true;
    } else {
        regErrCPass.innerText = '';
    }


    if (!err) {
        fetch('/services/regist.php', {
            method: 'POST',
            body: JSON.stringify({
                login: e.target.login.value,
                password: e.target.password.value,
                email: e.target.email.value,
            })
        })
            .then(res => res.json())
            .then(data => {
                if (data['msg'] === 'Успешно') {
                    window.location.href = '/';
                } else {
                    regErr.innerText = data['msg'];
                }

            })
            .catch((error) => {
                regErr.innerText = error;
            });
    }
});