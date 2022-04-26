<?php



class User
{

    function __construct()
    {
        $conn = mysqli_connect('localhost','root','','module_php');
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    public function create($name, $email, $password) {
        $result = mysqli_query($this->dbcon, "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')");
        return $result;
    }

    public function login ($email, $password) {
        $sqllogin = mysqli_query($this->dbcon,"select * from users where email = '$email' and password = '$password'");
        return $sqllogin;
    }
}