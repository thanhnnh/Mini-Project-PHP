<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("location:login.php");
    }


//    if($_SERVER['REQUEST_METHOD'] == 'POST') {
//        $errors = [];
//        if (empty(trim($_POST['title']))){
//            $errors['title']['required'] = 'Tieu de khong duoc de trong';
//        }
//
//        if (empty(trim($_POST['title']))){
//            $errors['description']['required'] = 'Noi dung khong duoc de trong';
//        }
//
//        if(!$errors) {
//            saveTask();
//        }
//    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Module PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <a href='../controller/LogoutController.php' style="display:flex; justify-content: flex-end;">Logout</a>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4">
                    <!-- MESSAGES -->

                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php session_unset(); } ?>

                    <!-- ADD TASK FORM -->
                    <div class="card card-body">
                        <form method="POST" action='../controller/TaskController.php'>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                            </div>
                            <div class="errors-task">
                                <?php
                                echo (!empty($errors['title']['required']))?'<span style = "color:red; padding: 0.375rem 0.8rem;">'.$errors['title']['required'].'</span>':false;
                                ?>
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                            </div>
                            <div class="errors-task">
                                <?php
                                echo (!empty($errors['description']['required']))?'<span style = "color:red; padding: 0.375rem 0.8rem;">'.$errors['description']['required'].'</span>':false;
                                ?>
                            </div>
                            <input style="margin-top: 1rem;" type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        include_once '../modal/Task.php';
                        $task = new Task();
                        $result_tasks = $task->fetchdata();

                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="editTask.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="#myModal" data-toggle="modal" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <div id="myModal" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header flex-column">
                                                    <h4 class="modal-title w-100">Bạn có muốn xoá task hay không?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <a href="../controller/DeleteTaskController.php?id=<?php echo $row['id']?>" class="btn btn-danger"> Yes
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>