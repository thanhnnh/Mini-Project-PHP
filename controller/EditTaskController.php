
<?php
    include_once '../modal/Task.php';
    $task = new Task();

    $title = '';
    $description= '';

    if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $task->fetchonerecord($id);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

    if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title= $_POST['title'];
    $description = $_POST['description'];

    $task-> update($id, $title, $description);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    header('Location:http://localhost/modulePHP/view/index.php');
}

?>


