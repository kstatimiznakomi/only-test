<?php 

require_once 'Db/Helpers.php';

class Validation {
    private $err = array();

    function validate($login, $phone, $email, $password, $confirmPassword) {
        $helper = new Helpers();
        $errors = array();
        $phonePattern = '([\+]*[7-8]{1}\s?[\(]*9[0-9]{2}[\)]*\s?\d{3}[-]*\d{2}[-]*\d{2})';
        $user = $helper->getUser($email, $phone, $login);

        if (!preg_match($phonePattern, $phone) && isset($phone)){
            $err = array('phoneWrong'=>'Введите корректно номер телефона');
            $errors = array_merge($errors, $err);
        }
        
        if ((strlen($phone) < 11 || strlen($phone)) > 12 && isset($email)) {
            $err = array('phoneLength'=>'Номер телефона не должен быть больше 12 символов и не меньше 11 символов');
            $errors = array_merge($errors, $err);
        }
        
        if (($password == '' || $confirmPassword == '') && isset($confirmPassword)) {
            $err = array('passwordBlank'=>'Пароль должен быть заполнен');
            $errors = array_merge($errors, $err);
        }

        if (!$helper->correctHashedPassword($password, $user[0]['password']) && str_contains($_SERVER["REQUEST_URI"], 'auth')) {
            $err = array('wrongPassword'=>'Неверный пароль');
            $errors = array_merge($errors, $err);
        }

        if (!$user && str_contains($_SERVER["REQUEST_URI"], 'login')){
            $err = array('userNotFound'=>'Пользователь не найден');
            $errors = array_merge($errors, $err);
        }

        if ((strlen($password) < 6 || strlen($confirmPassword) < 6) && isset($confirmPassword)) {
            $err = array('passwordBlank'=>'Пароль должен состоять минимум из 6 символов');
            $errors = array_merge($errors, $err);
        }

        if ((strlen($login) > 20 || strlen($login)) < 5 && isset($login)){
            $err = array('loginMaxLength'=>'Логин не должнен превышать 20 символов');
            $errors = array_merge($errors, $err);
        }

        if ($login == '' && isset($login)) {
            $err = array('loginBlank'=>'Логин должнен быть заполнен');
            $errors = array_merge($errors, $err);
        }

        if ($phone == '' && isset($phone)) {
            $err = array('phoneBlank'=>'Номер телефона должнен быть заполнен');
            $errors = array_merge($errors, $err);
        }

        if ($email == '' && isset($email)) {
            $err = array('emailBlank'=>'Почта должна быть заполнена');
            $errors = array_merge($errors, $err);
        }

        if (!str_contains($email, '@') && isset($email)) {
            $err = array('emailSymb'=>'Почта должна содержать @');
            $errors = array_merge($errors, $err);
        }

        if ($password != $confirmPassword && isset($confirmPassword)) {
            $err = array('passwordsNotEqual'=>'Пароли не совпадают');
            $errors = array_merge($errors, $err);
        }

        return $errors;
    }
}

?>