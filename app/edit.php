<?php
if (isset($_POST['id']) && isset($_POST['title'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "test_db";

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $title = trim($_POST['title']);

    if (!empty($title)) {
        // Update the task title in the database
        $stmt = $conn->prepare("UPDATE tasks SET title = ? WHERE id = ?");
        $stmt->bind_param("si", $title, $id);

        if ($stmt->execute()) {
            echo "1"; // Success
        } else {
            echo "0"; // Failure
        }
        $stmt->close();
    } else {
        echo "0"; // Invalid input
    }
    $conn->close();
} else {
    echo "0"; // Missing parameters
}
?>