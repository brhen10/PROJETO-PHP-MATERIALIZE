
<?php
require_once './login.php';

        $login = Login::getInstance();
        if($login->logout()){

        }   
        header("Location: ../index.php");
        die();
        ?>