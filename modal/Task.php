<?php


class Task
{

    function __construct()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'module_php');
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

    public function fetchdata() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM task");
        return $result;
    }

    public function create($title, $description) {
        $result = mysqli_query($this->dbcon, "INSERT INTO task(title, description) VALUES ('$title', '$description')");
        return $result;
    }

    public function fetchonerecord($id) {
        $result = mysqli_query($this->dbcon, "SELECT * FROM task WHERE id = '$id'");
        return $result;
    }

    public function update($id, $title, $description) {
        $result = mysqli_query($this->dbcon, "UPDATE task set title = '$title', description = '$description' WHERE id=$id");
        return $result;
    }

    public function delete($id) {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM task WHERE id = '$id'");
        return $deleterecord;
    }

}