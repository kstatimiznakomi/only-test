<?php 
    require_once 'Db/Helpers.php';
    $helper = new Helpers();

    if (isset($_SESSION['user']['id'])) $helper->redirect('/');
    if (count($_SESSION['errors']) == 0) $helper->redirect('/registration');
    error_reporting(E_ERROR | E_PARSE);
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
        <style>
            <?php include "css/Style.css";?> 
        </style>
    </head>
    
    <body>
        <div class="page__title mb-2 mt-3">
            <span>Регистрация</span>
        </div>
        <div class="d-flex justify-content-center">
            <form class="form" action="/register" method="post">
                <?php if ($_SESSION['errors']['userExists']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['userExists']?></p>
                <?php endif; ?>
                <input placeholder="Логин" name="login" type="text" required>
                <?php if ($_SESSION['errors']['loginBlank']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['loginBlank']?></p>
                <?php endif; ?>
                <?php if ($_SESSION['errors']['loginMaxLength']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['loginMaxLength']?></p>
                <?php endif; ?>
                <input placeholder="Телефон" name="phone" type="tel" 
                    pattern="([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})" required minlength="10" maxlength="11">
                <?php if ($_SESSION['errors']['phoneBlank']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['phoneBlank']?></p>
                <?php endif; ?>
                <?php if ($_SESSION['errors']['phoneWrong']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['phoneWrong']?></p>
                <?php endif; ?>
                <input placeholder="Почта" name="email" type="email" required>
                <?php if ($_SESSION['errors']['emailBlank']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['emailBlank']?></p>
                <?php endif; ?>
                <?php if ($_SESSION['errors']['emailSymb']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['emailSymb']?></p>
                <?php endif; ?>
                <input placeholder="Пароль" name="password" type="password" required>
                <input placeholder="Подтверждение пароля" name="confirm-password" type="password" required>
                <?php if ($_SESSION['errors']['passwordsNotEqual']) : ?>
                    <p class="error__message"><?php echo $_SESSION['errors']['passwordsNotEqual']?></p>
                <?php endif; ?>
                <div class="smart-captcha" data-sitekey="ysc1_qxPdqq0RIynNd4QPB0slo82agcaGuwxcndUBD2YR37ae66a6"></div>
                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
        <div class="d-flex mt-3 align-items-center justify-content-center">
                <p class="page__title">Уже зарегистрированы? Тогда вы можете-&gt</p>
                <a class="action" href="/login">войти</a>
            </div>
        </div>
    </body>
</html>
