<?php
    require_once 'validation/Validation.php';
    require_once 'Db/Helpers.php';

    $validator = new Validation();
    $helper = new Helpers();

    $phone = null;
    $email = null;
    $login = $_POST['login'] == '' ? null : $_POST['login'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    str_contains($_POST['login'], '@') ? $email = $_POST['login'] : $phone = $_POST['login'];
    
    if(count($validator->validate($login, $phone, $email, $password, $confirmPassword)) == 0){
        $user = $helper->getUser($email, $phone, $login);


        $_SESSION['user']['id'] = $user[0]['id'];
        $helper->redirect('/profile');
    } else {
            $errs = $validator->validate($login, $phone, $email, $password, $confirmPassword);
            $_SESSION['errors'] = $errs;
            $helper->redirect('/login?err');
        }
?>