<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['team_count'] = intval($_POST['team_count']);
    header("Location: setup.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter Number of Teams</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            padding: 40px;
            text-align: center;
        }
        input, button {
            padding: 10px;
            font-size: 18px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h2>🏁 Group Event Setup – Step 1</h2>
    <form method="POST" action="">
        <label for="team_count">Enter number of teams:</label><br>
        <input type="number" id="team_count" name="team_count" min="1" required><br>
        <button type="submit">Next ➡️</button>
    </form>
</body>
</html>
