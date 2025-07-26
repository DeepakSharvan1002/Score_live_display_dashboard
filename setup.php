<?php
session_start();

if (!isset($_SESSION['team_count'])) {
    header("Location: index.php");
    exit();
}

$team_count = $_SESSION['team_count'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['team_names'] = $_POST['team_names'];
    $_SESSION['task_names'] = $_POST['task_names'];
    header("Location: enter_scores.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter Teams and Tasks</title>
    <style>
        body {
            font-family: Arial;
            background: #e6f2ff;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input, button {
            padding: 10px;
            font-size: 16px;
            margin: 10px 0;
            width: 100%;
        }
        .task-box {
            display: flex;
            gap: 10px;
            align-items: center;
        }
    </style>
    <script>
        function addTaskField() {
            const taskList = document.getElementById("taskList");
            const taskBox = document.createElement("div");
            taskBox.className = "task-box";

            const input = document.createElement("input");
            input.type = "text";
            input.name = "task_names[]";
            input.placeholder = "Enter task name";
            input.required = true;

            const removeBtn = document.createElement("button");
            removeBtn.type = "button";
            removeBtn.innerText = "❌";
            removeBtn.onclick = () => taskBox.remove();

            taskBox.appendChild(input);
            taskBox.appendChild(removeBtn);
            taskList.appendChild(taskBox);
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>📝 Enter Team Names & Tasks</h2>
        <form method="POST" action="">
            <h3>👥 Team Names</h3>
            <?php for ($i = 1; $i <= $team_count; $i++): ?>
                <input type="text" name="team_names[]" placeholder="Team <?= $i ?> Name" required>
            <?php endfor; ?>

            <h3>🎯 Task Names</h3>
            <div id="taskList">
                <!-- One task field by default -->
                <div class="task-box">
                    <input type="text" name="task_names[]" placeholder="Enter task name" required>
                    <button type="button" onclick="this.parentElement.remove()">❌</button>
                </div>
            </div>
            <button type="button" onclick="addTaskField()">➕ Add Task</button><br><br>

            <button type="submit">Next ➡️</button>
        </form>
    </div>
</body>
</html>
