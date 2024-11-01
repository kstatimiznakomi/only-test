<?php
    require_once 'validation/Validation.php';
    require_once 'Db/Helpers.php';

    $helper = new Helpers();
    $validator = new Validation();

    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password']; 

    if(count($validator->validate($login, $phone, $email, $password, $confirmPassword)) == 0){
        $user = $helper->getUser($email, $phone, $login);
        if ($user) $helper->redirect('/register?err');



        $helper->sendUser($login, $phone, $email, $password);
        $helper->redirect('/success');
    } else {
        $errs = $validator->validate($login, $phone, $email, $password, $confirmPassword);
        $_SESSION['errors'] = $errs;
        $helper->redirect('/register?err');
    }
?>