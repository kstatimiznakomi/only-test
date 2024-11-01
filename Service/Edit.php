<?php 
    require_once 'validation/Validation.php';
    require_once 'Db/Helpers.php';

    
    $helper = new Helpers();
    $validator = new Validation();
    
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(count($validator->validate($login, $phone, $email, $password, null)) == 0){
        $helper->editUser($email, $phone, $login, $password, $_SESSION['user']['id']);
        $helper->redirect('/profile');
    } else {
        $errs = $validator->validate($login, $phone, $email, $password, null);
        $_SESSION['errors'] = $errs;
        $helper->redirect('/register?err');
    }
?>