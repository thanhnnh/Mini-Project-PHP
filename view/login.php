<?php
    require_once '../controller/LoginController.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors=[];

        if (empty(trim($_POST['email']))){
            $errors['email']['required'] = 'Email khong duoc de trong';
        }

        if (empty(trim($_POST['password']))){
            $errors['password']['required'] = 'Password khong duoc de trong';
        }

        if($errors == null) {
            login();
        }
    }

    if( isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Module PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
    <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" class="form-control" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"/>
            <label class="form-label" for="form2Example1">Email address</label>
            <?php
            echo (!empty($errors['email']['required']))?'<span style = "color:red; padding: 0.375rem 0.8rem;">'.$errors['email']['required'].'</span>':false;
            ?>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control"  name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
            <label class="form-label" for="form2Example2">Password</label>
            <?php
            echo (!empty($errors['password']['required']))?'<span style = "color:red; padding: 0.375rem 0.8rem;">'.$errors['password']['required'].'</span>':false;
            ?>
        </div>

        <?php
        if(isset($_COOKIE["error"])){
            ?>
            <div class="alert alert-danger" style="text-align: center;">
                <strong></strong> <?php echo $_COOKIE["error"]; ?>
            </div>
        <?php } ?>
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>  />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href='register.php'>Register</a></p>
        </div>
    </form>
</body>
</html>
