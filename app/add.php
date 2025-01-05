<?php

if(isset($_POST['title'])){
    $host = "localhost";
        $username = "root";
        $password = "";
        $database = "test_db";

        $conn = new mysqli($host, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO tasks(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
    $conn->close();
}else {
    header("Location: ../index.php?mess=error");
}
?>