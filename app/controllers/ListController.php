<?php

require_once __DIR__ . '/../models/List.php';

class ListController {
    private $model;
    public function __construct()
    {
        $this->model = new Task();
    }

    public function showTaskList(){
        $tasks = $this->model->getAllTasks();

        require_once __DIR__ . '/../views/task-list.php';
    }
}

?>