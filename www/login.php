<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../config/db_config_mysqli.php");
    session_start();

    $username = filter_input(INPUT_POST, "Username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_STRING);

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hash = $row["password"];

        if (password_verify($password, $hash)) {
            $_SESSION["username"] = $row["username"];
            header("Location: ./chat.php");
            exit();
        } else {
            echo "<h1>Incorrect username or password";
        }
    }

    $stmt->close();
    $mysqli->close();
    exit();
}
?>