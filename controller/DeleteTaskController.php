<?php

    include_once '../modal/Task.php';
    $task = new Task();

    if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $task->delete($id);
            if(!$result) {
                die("Query Failed.");
            }

            $_SESSION['message'] = 'Task Removed Successfully';
            $_SESSION['message_type'] = 'danger';
            header('Location:http://localhost/modulePHP/view/index.php');
        }
