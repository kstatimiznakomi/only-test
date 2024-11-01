<?php 
    require_once 'Db/Helpers.php';
    $helper = new Helpers();

    if (!isset($_SESSION['user']['id'])) $helper->redirect('/');

    $user = $helper->getUserById($_SESSION['user']['id']);
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Профиль</title>
        <style>
            <?php include "css/Style.css";?> 
        </style>
    </head>
    
    <body>
        <div class="page__title mb-2 mt-3">
            <span>Профиль</span>
        </div>
        <div class="d-flex align-items-center flex-column">
            <div>
                <form action="/profile/edit" method="post">
                    <div class="profile">
                        <div class="profile__data">
                            <p class="profile__point">Логин</p>
                            <input placeholder="Введите логин" name="login" required value="<?php echo $user[0]['login'] ?>" type="text">
                        </div>
                        <hr>
                        <div class="profile__data">
                            <p class="profile__point">Почта</p>
                            <input placeholder="Введите почту" name="email" value="<?php echo $user[0]['email'] ?>" type="email" required>
                        </div>
                        <hr>
                        <div class="profile__data">
                            <p class="profile__point">Номер телефона</p>
                            <input name="phone" placeholder="Введите номер телефона" value="<?php echo $user[0]['phone'] ?>"
                            pattern="([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})" required minlength="11" maxlength="12" type="tel">
                        </div>
                        <hr>
                        <div class="profile__data">
                            <p class="profile__point">Пароль</p>
                            <input name="password" placeholder="Введите пароль" type="password" required>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center w-100">
                        <button type="submit">Сохранить</button>
                    </div>
                </form>
                <a class="mt-3 btn" href="/logout">Выйти</a>
            </div>
        </div>
    </body>
</html>
