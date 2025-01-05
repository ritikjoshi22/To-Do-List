<?php

if (isset($_POST['id'])){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "test_db";

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Delete: Delete a record from the users table
    $taskId = intval($_POST['id']);
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $taskId);

    if ($stmt->execute()) {
        header("Location: ../index.php?mess=success"); 
    } else {
        header("Location: ../index.php"); 
    }

   $conn->close();
}else{
    header("Location: ../index.php?mess=error");
}
    
?>