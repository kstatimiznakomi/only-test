<?php
    require 'Db/Config.php';

    class Helpers {
        function redirect($path) {
            header('Location:' . $path);
            die;
        }

        function logout(){
            unset($_SESSION['user']['id']);
            $this->redirect('/');
        }

        function getUsers() {
            $con = mysqli_connect(host, username, password, db_name);
            if ($con){
                mysqli_set_charset($con, "utf8");
                $query = 'SELECT * FROM users';
                $result = mysqli_query($con, $query);
                
                print_r($result->fetch_assoc());

                mysqli_close($con);
            } else print("Ошибка: не удалось подключиться к MySQL " . mysqli_connect_error());
        }

        function getUser($email, $phone, $login) {
            $con = mysqli_connect(host, username, password, db_name);
            if ($con){
                mysqli_set_charset($con, "utf8");
                $stmt = mysqli_prepare($con, "SELECT id, email, phone, login, password FROM only_test_task.users where email=? or phone=? or login=?");
                $stmt->bind_param('sss', $email, $phone, $login);

                $stmt->execute();
                $result = $stmt->get_result();
                $user = [];

                if ($row = $result->fetch_assoc()) {
                    $user[] = $row;
                }
                
                $stmt->close();
                
                mysqli_close($con);
                return $user;
            } else print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }

        function editUser($email, $phone, $login, $password, $id) {
            $con = mysqli_connect(host, username, password, db_name);
            if ($con){
                mysqli_set_charset($con, "utf8");
                $hashPassword = password_hash($password, PASSWORD_BCRYPT);
                $stmt = mysqli_prepare($con, "UPDATE only_test_task.users SET email=?, phone=?, login=?, password=? where id=?");
                $stmt->bind_param('sssss', $email, $phone, $login, $hashPassword, $id);

                $stmt->execute();
                $stmt->close();
                
                mysqli_close($con);
            } else print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }

        function correctHashedPassword($password, $hashPassword) {
            return password_verify($password, $hashPassword);
        }

        function sendUser($login, $phone, $email, $password) {
            $con = mysqli_connect(host, username, password, db_name);
            if ($con){
                mysqli_set_charset($con, "utf8");
                $hashPassword = password_hash($password, PASSWORD_BCRYPT);
                $stmt = mysqli_prepare($con, "INSERT INTO only_test_task.users (phone, email, password, login) VALUES (?, ?, ?, ?)");
                $stmt->bind_param('ssss', $phone, $email, $hashPassword, $login);

                $stmt->execute();
                $stmt->close();
                
                mysqli_close($con);
            } else print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }

        function getUserById($id) {
            $con = mysqli_connect(host, username, password, db_name);
            if ($con){
                mysqli_set_charset($con, "utf8");
                $stmt = mysqli_prepare($con, "SELECT * FROM only_test_task.users where id=?");
                $stmt->bind_param('s', $id);

                $stmt->execute();
                $result = $stmt->get_result();
                $user = [];

                if ($row = $result->fetch_assoc()) {
                    $user[] = $row;
                }
                
                $stmt->close();
                
                mysqli_close($con);
                return $user;
            } else print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
    }
?>