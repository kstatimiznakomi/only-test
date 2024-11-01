<?php
class Router {
    private $pages = array (
        '/' => 'views/Main.php',
        '' => 'views/Main.php',
        '/registration' => 'views/Registration.php',
        '/profile' => 'views/Profile.php',
        '/register' => 'Service/Register.php',
        '/login' => 'views/Login.php',
        '/auth' => 'Service/Auth.php',
        '/register?err' => 'views/RegisterErr.php',
        '/login?err' => 'views/LoginErr.php',
        '/logout' => 'Service/Logout.php',
        '/success' => 'views/Success.php',
        '/user-edit' => 'views/EditUser.php',
        '/profile/edit' => 'Service/Edit.php',
    );

    function notFound() {
        require '404.php';
        die();
    }

    function route($url) {
        if (!array_key_exists($url, $this->pages)) $this->notFound();

        include $this->pages[$url];
    }
}
?>