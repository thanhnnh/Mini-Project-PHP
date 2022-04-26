<?php
function register() {
    include_once '../modal/User.php';
    $user = new User();

    if (isset($_POST['register']) ) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $rePassword = md5($_POST["repassword"]);

        if( $password != $rePassword) {
            echo "<script>alert('Mật khẩu không trùng khớp');</script>";
            echo "<script>window.location.href='register.php'</script>";
        }

        if($password == $rePassword) {
            $sql = $user->create($name, $email, $password);

            if($sql) {
                header('location:login.php');
            }else {
                header("location:register.php");
            }
        }
    } else {
        header("location:view/register.php");
    }
    }
