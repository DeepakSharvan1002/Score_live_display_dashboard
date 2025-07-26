<?php
session_start();

// Destroy all session data
$_SESSION = [];
session_unset();
session_destroy();

echo "<h2>Session destroyed successfully.</h2>";
echo "<a href='session_fill.php'>Fill Session Again</a> | ";
echo "<a href='display.php'>Try Display Page</a>";
?>
