<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "test_db";

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $taskId = intval($_POST['id']);
    $status = $_POST['status']; // 'completed' or 'pending'

    // Update query
    $sql = "UPDATE tasks SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $taskId);

    if ($stmt->execute()) {
        echo "1"; // Success
    } else {
        echo "0"; // Failure
    }

    $stmt->close();
    $conn->close();
} else {
    echo "0"; // Failure
}
?>
