auth/register.php line 18 
$response = json_decode(file_get_contents("https://smartcaptcha.yandexcloud.net/validate?secret=".$_POST['smart-token']."&ip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['status'] !== "ok"){
            $helper->redirect('/login');
        }
