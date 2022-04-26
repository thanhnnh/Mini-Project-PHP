<?php

    include_once '../modal/Task.php';
    $task = new Task();

    if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $result = $task->create($title, $description);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location:http://localhost/modulePHP/view/index.php');

}
