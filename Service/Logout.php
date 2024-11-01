<?php
    require_once 'Db/Helpers.php';  

    $helper = new Helpers();
    $helper->logout();
    session_abort();
?>