<?php
    require_once __DIR__ . '/app/controllers/ListController.php';

    $listController = new ListController();

    $listController->showTaskList();
?>