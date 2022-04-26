<?php
    session_start();
    if($_SESSION["login"]){
        unset($_SESSION["login"]);
        header("Location:http://localhost/modulePHP/view/index.php");
    }
?>