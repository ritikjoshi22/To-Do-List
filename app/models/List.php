<?php
// Model: Handles data and logic for tasks
class Task {
    private $tasks = []; // Array to hold tasks

    public function __construct() {
        // Simulate some initial tasks
        $this->tasks = [
            ["id" => 1, "title" => "Complete homework", "status" => "pending"],
            ["id" => 2, "title" => "Clean the house", "status" => "completed"],
            ["id" => 3, "title" => "Go grocery shopping", "status" => "pending"]
        ];
    }

    // Function to fetch all tasks
    public function getAllTasks() {
        return $this->tasks;
    }

    // Function to add a new task
    public function addTask($title) {
        $newTask = [
            "id" => count($this->tasks) + 1, // Generate a unique ID
            "title" => $title,
            "status" => "pending"
        ];
        $this->tasks[] = $newTask;
        return $newTask;
    }

    // Function to mark a task as completed
    public function completeTask($id) {
        foreach ($this->tasks as &$task) {
            if ($task["id"] == $id) {
                $task["status"] = "completed";
                return $task;
            }
        }
        return null; // Task not found
    }

    // Function to delete a task
    public function deleteTask($id) {
        foreach ($this->tasks as $key => $task) {
            if ($task["id"] == $id) {
                unset($this->tasks[$key]);
                return true; // Task deleted
            }
        }
        return false; // Task not found
    }
}
?>
