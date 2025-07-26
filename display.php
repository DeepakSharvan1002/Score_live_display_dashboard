<?php
session_start();

$teams = $_SESSION['team_names'] ?? [];
$tasks = $_SESSION['task_names'] ?? [];
$scores = $_SESSION['scores'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Scoreboard</title>
    <meta http-equiv="refresh" content="5"> <!-- Auto-refresh every 5 seconds -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #1e1e2f;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background: #2e2e42;
            box-shadow: 0 0 20px #000;
        }
        th, td {
            padding: 14px;
            border: 1px solid #444;
        }
        th {
            background-color: #444466;
        }
        tr:nth-child(even) {
            background-color: #3a3a52;
        }
        .highlight {
            background-color: #0066cc !important;
        }
    </style>
</head>
<body>
    <h1>📊 Live Event Scoreboard</h1>
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
                        <td><?= $scores[$tIndex][$teamIndex] ?? '-' ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
