<?php
// Definition:
// CRUD operations are fundamental for interacting with databases. 
// These include Create (Insert), Read (Select), Update, and Delete queries.

// MySQL database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "test_db";

// Connect to MySQL database using MySQLi
try{
    $conn = new mysqli($host, $username, $password, $database);
}catch(mysqli_sql_exception $e){
    die("Connection failed: " . $conn->connect_error);
}

// Close the database connection
$conn->close();
?>