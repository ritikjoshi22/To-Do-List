<?php
// Model: Handles data and logic for tasks

class Task
{
    private $tasks = []; // Array to hold tasks

    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "test_db";

        $conn = new mysqli($host, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Retrieving all the task from the tasks table
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);
        $this->tasks = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            $this->tasks[] = [
                "id" => $row["id"],
                "title" => $row["title"],
                "status" => $row["status"]
            ];
            }
        }else{
            $this->tasks = [];
        }
        $conn->close();
    }

    // Function to fetch all tasks
    public function getAllTasks()
    {
        return $this->tasks;
    }

    // Function to add a new task
    public function addTask($title)
    {
        $newTask = [
            "id" => count($this->tasks) + 1, // Generate a unique ID
            "title" => $title,
            "status" => "pending"
        ];
        $this->tasks[] = $newTask;
        return $newTask;
    }

    // Function to mark a task as completed
    public function completeTask($id)
    {
        foreach ($this->tasks as &$task) {
            if ($task["id"] == $id) {
                $task["status"] = "completed";
                return $task;
            }
        }
        return null; // Task not found
    }

    // Function to delete a task
    public function deleteTask($id)
    {
        foreach ($this->tasks as $key => $task) {
            if ($task["id"] == $id) {
                unset($this->tasks[$key]);
                return true; // Task deleted
            }
        }
        return false; // Task not found
    }
}
