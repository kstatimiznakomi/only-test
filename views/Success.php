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
        <title>Успешно</title>
        <style> 
            <?php include "css/Style.css"; ?>
        </style>
    </head>
    
    <body>
        <div class="page__title">
            <span>Вы успешно зарегистрированы</span>
        </div>
    </body>
</html>
