<?php
function login() {
    session_start();
    include_once '../modal/User.php';
    $user = new User();

    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $result = $user->login($email, $password);
        $rows = mysqli_fetch_row($result);
        if(count($rows)){
            $_SESSION["login"] = $rows;

            //remember me
            if ( isset($_POST["remember"])) {
                setcookie('email', $_POST["email"], time()+(60*60*24));
                setcookie('password', $_POST["password"], time()+(60*60*24));
            }else {
                setcookie('email', '', time()-(1));
                setcookie('password', '', time()-(1));
            }
            header("location:index.php");
        }
        else {
            header("location:login.php");
            setcookie("error", "Tài khoản hoặc mật khẩu không chính sác!", time() + 1, "/", "", 0);
        }
    }
}
