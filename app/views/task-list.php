<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do List</title>
    <link rel="stylesheet" href="/public/css/style.css"> <!-- Link to external CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">
        <h1 class="mb-4">📝 To-Do List</h1>
        <!-- Add New Task Button -->
        <button class="add-new-btn" onclick="alert('Add Task button clicked!');">
            +Add New
        </button>
        <div class="task-list bg-dark text-white p-4 rounded shadow-lg">
            <?php foreach ($tasks as $task): ?>
                <div class="task-item d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <input type="checkbox" class="form-check-input me-2" <?= $task['status'] === 'completed' ? 'checked' : '' ?>>
                        <span class="<?= $task['status'] === 'completed' ? 'text-decoration-line-through' : '' ?>">
                            <?= htmlspecialchars($task['title']) ?>
                        </span>
                    </div>
                    <div style="margin-left: 20px;">
                        <button class="btn btn-warning btn-sm me-2">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>