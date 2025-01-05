<?php
require 'db_conn.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5rem;
            color: #f4f4f4;
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            margin-bottom: 20px;
            /* Add spacing below the title */
        }

        .task-list {
            width: 100%;
            max-width: 600px;
        }

        .task-item {
            padding: 15px;
            /* Add padding inside each task item */
            margin-bottom: 15px;
            /* Add margin between task items */
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            transition: transform 0.2s, background-color 0.3s;
        }

        .task-item:hover {
            transform: scale(1.02);
            background-color: rgba(255, 255, 255, 0.2);
        }

        .task-item div {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Add spacing between checkbox and title */
        }

        button {
            font-size: 0.9rem;
            margin-left: 5px;
            /* Add spacing between buttons */
        }

        input[type="checkbox"] {
            background-color: white;
        }

        .container {
            text-align: center;
            /* Center-align all text inside the container */
        }

        .container .task-list {
            margin-top: 20px;
            /* Add spacing between the title and task list */
        }

        .add-new-btn {
            font-size: 1rem;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            /* Add spacing below the button */
            transition: background-color 0.3s ease;
        }

        .add-new-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">
        <h1 class="mb-4">📝 To-Do List</h1>

        <div class="task-list bg-dark text-white p-4 rounded shadow-lg">
            <!-- Add New Task Button -->
            <div class="add-section">
                <form action="app/add.php" method="POST" autocomplete="off">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                        <input type="text"
                            name="title"
                            style="border-color: #ff6666;"
                            placeholder="This field is required" />
                        <button type="submit">Add &nbsp; <span>&#43;</span></button>

                    <?php } else { ?>
                        <input type="text"
                            name="title"
                            placeholder="What do you need to do?"
                            style="border: none;
                            border-radius:10px;
                            height:30px;
                            width:300px;
                            text-align: center;" />
                        <button type="submit" class="add-new-btn">Add &nbsp; <span>&#43;</span></button>
                    <?php } ?>
                </form>
            </div>
            <?php foreach ($tasks as $task): ?>
                <div id="task-<?= $task['id']; ?>" class="task-item d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <input type="checkbox" class="form-check-input me-2" <?= $task['status'] === 'completed' ? 'checked' : '' ?>>
                        <span class="<?= $task['status'] === 'completed' ? 'text-decoration-line-through' : '' ?>">
                            <?= htmlspecialchars($task['title']) ?>
                        </span>
                    </div>
                    <div style="margin-left: 20px;">
                        <button class="btn btn-warning btn-sm me-2" onclick="">Edit</button>
                        <form action="app/delete.php" method="POST" autocomplete="off">
                            <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                                <button class="delete-btn btn btn-danger btn-sm" id="<?php echo $task["id"]; ?>">Delete</button>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <script>
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const taskTitle = this.nextElementSibling; // The span element next to the checkbox
                if (this.checked) {
                    taskTitle.classList.add('text-decoration-line-through');
                } else {
                    taskTitle.classList.remove('text-decoration-line-through');
                }
            });
        });
        // const deleteBtn = document.querySelectorAll('.delete-btn');
        // deleteBtn.forEach(button=>{
        //     button.addEventListener('click', function(){
        //         const id = $(this).attr('id');

        //         $.post("app/delete.php", 
        //               {
        //                   id: id
        //               },
        //               (data)  => {
        //                  if(data){
        //                      $(this).parent().hide(600);
        //                  }
        //               }
        //         );
        //     })
        // })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>