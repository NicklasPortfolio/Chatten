<?php
$mysqli = new mysqli("localhost", "root", "", "chat");

if ($mysqli->connect_errno) {
    echo "Failed to connec to MySQL:" . $mysqli->connect_error;
    exit();
}
?>