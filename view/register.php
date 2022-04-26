<?php
include_once '../controller/RegisterController.php';

    if( $_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    //validate name
    if (empty(trim($_POST['name']))) {
        $errors['name']['required'] = 'Ho ten khong duoc de trong';
    }

    //validate email
    if (empty(trim($_POST['email']))) {
        $errors['email']['required'] = 'Email khong duoc de trong';
    } else {
        if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $errors['email']['invalid'] = 'Email khong hop le';
        }
    }

    if (empty(trim($_POST['password']))) {
        $errors['password']['required'] = 'Password khong duoc de trong';
    } else {
        if (!filter_var(trim($_POST['password']), FILTER_VALIDATE_INT, [
            'option' => ['min' => 6]
        ])) {
            $errors['password']['min'] = 'Password khong hop le';
        }
    }

    if (empty(trim($_POST['repassword']))) {
        $errors['repassword']['required'] = 'Password Confirm khong duoc de trong';
    } else {
        if (!filter_var(trim($_POST['repassword'])) && ($_POST['repassword'] != $_POST['password'])) {
            $errors['repassword']['fail'] = 'Password khong hop le';
        }
    }

    if($errors==null) {
        register();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="full_name" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="register-errors">
                                <?php
                                echo (!empty($errors['name']['required']))?'<span style = "color:red;">'.$errors['name']['required'].'</span>':false;
                                ?>
                            </div>

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="register-errors">
                                <?php
                                echo (!empty($errors['email']['required']))?'<span style = "color:red;">'.$errors['email']['required'].'</span>':false;
                                echo (!empty($errors['email']['invalid']))?'<span style = "color:red;">'.$errors['email']['invalid'].'</span>':false;
                                ?>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password"  class="form-control" name="password">
                                </div>
                            </div>
                            <div class="register-errors">
                                <?php
                                echo (!empty($errors['password']['required']))?'<span style = "color:red;">'.$errors['password']['required'].'</span>':false;
                                echo (!empty($errors['password']['min']))?'<span style = "color:red">'.$errors['password']['min'].'</span>':false;
                                ?>
                            </div>

                            <div class="form-group row">
                                <label for="repassword" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password"  class="form-control" name="repassword">
                                </div>
                            </div>
                            <div class="register-errors">
                                <?php
                                echo (!empty($errors['repassword']['required']))?'<span style = "color:red;">'.$errors['repassword']['required'].'</span>':false;
                                ?>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="register">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>