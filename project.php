<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
    <style>
        /* CSS styles here */
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        .addtask {
display: inline;
align-items: center;
text-align: center;
border: none;
background-color: grey;
padding: 10px;
margin: 10px:

}

        .container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h1, h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
        }

        button {
            display: flex;
            padding: 15px 15px;
            margin: 10px;
            border: 1px, solid;
            border-radius: 10px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.5s;
        }

        button:hover {
            background-color: #2980b9;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Pacifico', cursive;
            font-size: 20px;
        }

        .task-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fade-in 0.5s ease;
        }

        .task-item.completed label {
            text-decoration: line-through;
        }

        .completed-tasks {
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .completed-task-preview {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            margin-top: 20px;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: slide-up 0.5s ease;
        }

        .vector-art {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .user-guide {
            text-align: left;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .user-guide p {
            margin: 10px 0;
        }

        .highlight {
            background-color: #ffe9c6;
            padding: 2px 4px;
            border-radius: 4px;
        }

        .task-actions {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
        }

        .task-actions button {
            margin: 60px;
        }

        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes slide-up {
            0% { transform: translateY(50px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Management</h1>
        <form method="POST">
            <input type="text" name="task" placeholder="Enter task">
            <button type="submit" class="addtask">Add Task</button>
        </form>
        <h2>Tasks:</h2>
        <ul>
            <?php
            session_start();
            $tasks = isset($_SESSION['tasks']) ? $_SESSION['tasks'] : [];

            if (isset($_POST['task']) && $_POST['task'] !== '') {
                $newTask = $_POST['task'];
                $tasks[] = ['task' => $newTask, 'completed' => false];
                $_SESSION['tasks'] = $tasks;
            }

            if (isset($_POST['delete'])) {
                $indexToDelete = $_POST['delete'];
                unset($tasks[$indexToDelete]);
                $_SESSION['tasks'] = array_values($tasks);
            }

            if (isset($_POST['taskStatus'])) {
                $completedTasks = $_POST['taskStatus'];
                foreach ($completedTasks as $completedTask) {
                    $tasks[$completedTask]['completed'] = true;
                }
                $_SESSION['tasks'] = $tasks;
            }

            foreach ($tasks as $index => $task) {
                $completed = $task['completed'] ? 'completed' : '';
                echo "<li class='task-item $completed'>
                        <div class='task-item'>
                            <label>{$task['task']}</label>
                            <form class='delete-form' method='POST'>
                                <input type='hidden' name='delete' value='$index'>
                                <button type='submit'>Delete</button>
                            </form>
                            <form class='completed-form' method='POST'>
                                <input type='hidden' name='taskStatus[]' value='$index'>
                                <button type='submit'>Complete</button>
                            </form>
                        </div>
                    </li>";
            }
            ?>
        </ul>

        <h2>Completed Tasks:</h2>
        <div class="completed-tasks">
            <?php
            foreach ($tasks as $index => $task) {
                if ($task['completed']) {
                    echo "<div class='completed-task-preview'>{$task['task']}</div>";
                }
            }
            ?>
        </div>

        <div class="vector-art">
            <!-- Add vector art using HTML or CSS -->
        </div>

        <div class="user-guide">
            <h2>User Guide</h2>
            <p>1. Enter your task in the input field above.</p>
            <p>2. Click the "Add Task" button to add the task to the list.</p>
            <p>3. Each task item will have a checkbox and delete button.</p>
            <p>4. Check the checkbox to mark a task as completed.</p>
            <p>5. Click the delete button to remove a task from the list.</p>
            <p>6. Completed tasks will be moved to the "Completed Tasks" section.</p>
            <p>7. The "Completed Tasks Preview" section shows a summary of completed tasks.</p>
            <p>8. Enjoy using the task management web application!</p>
        </div>
<b> <a href="http://localhost/protected.php"> Logout from this Local Account </b>

        <script>
            // Add animations here (if any)
        </script>
    </div>
</body>
</html>
