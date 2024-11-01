<?php 
    require_once 'Db/Helpers.php';
    $helper = new Helpers();

    if (isset($_SESSION['user']['id'])) $helper->redirect('/');
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
        <title>Авторизация</title>
        <?php 
            echo '<style>';
            include "css/Style.css"; 
            echo '</style>';?>
    </head>
    
    <body>
        <div class="page__title mb-2 mt-3">
            <span>Авторизация</span>
        </div>
        <div class="d-flex justify-content-center">
            <form class="form" method="post" action="/auth">
                <input class="auth__input" placeholder="Номер телефона, почта или логин" name="login" type="text" required>
                <input placeholder="Пароль" name="password" type="password" required>
                <input placeholder="Подтверждение пароля" name="confirm-password" type="password" required>
                <div class="smart-captcha" data-sitekey="ysc1_qxPdqq0RIynNd4QPB0slo82agcaGuwxcndUBD2YR37ae66a6"></div>
                <button type="submit">Войти</button>
            </form>
        </div>
        <div class="d-flex mt-3 align-items-center justify-content-center">
            <p>Нет аккаунта? Тогда вы можете-&gt</p>
            <a class="action" href="/registration">зарегистрироваться</a>
        </div>
    </body>
</html>
