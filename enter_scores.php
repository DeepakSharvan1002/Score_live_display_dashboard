<?php
session_start();

if (!isset($_SESSION['team_names']) || !isset($_SESSION['task_names'])) {
    header("Location: setup.php");
    exit();
}

$teams = $_SESSION['team_names'];
$tasks = $_SESSION['task_names'];
$scores = $_SESSION['scores'] ?? []; // Preserve old scores

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['scores'] = $_POST['scores'];
    header("Location: enter_scores.php"); // Refresh after submit
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter Scores</title>
    <style>
        body {
            font-family: Arial;
            background: #fefefe;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #999;
            padding: 12px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
        input[type="number"] {
            width: 80px;
            padding: 6px;
            font-size: 16px;
        }
        button {
            margin-top: 20px;
            padding: 10px 30px;
            font-size: 16px;
        }
        a {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            font-size: 18px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2>🎯 Enter Scores for Each Task</h2>
    <form method="POST" action="">
        <table>
            <thead>
                <tr>
                    <th>Task / Team</th>
                    <?php foreach ($teams as $team): ?>
                        <th><?= htmlspecialchars($team) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $tIndex => $task): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($task) ?></strong></td>
                        <?php foreach ($teams as $teamIndex => $team): ?>
                            <td>
                                <input type="number" name="scores[<?= $tIndex ?>][<?= $teamIndex ?>]"
                                value="<?= isset($scores[$tIndex][$teamIndex]) ? $scores[$tIndex][$teamIndex] : 0 ?>" required>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit">💾 Save Scores</button>
    </form>

    <a href="display.php" target="_blank">📺 Open Live Scoreboard</a>
</body>
</html>
