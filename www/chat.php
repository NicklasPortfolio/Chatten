<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatten</title>
    <link rel="stylesheet" href="./css/chat.css">
</head>

<body>
    <?php
    session_start();
    if ($_SESSION["username"] == "admin") {
        ?>
        <form action="register.php" method="post">
            <button class="button" type="submit" name="submit">Register New User</button>
        </form>
        <?php
    }
    ?>
    <div class="chat">
        <div>
            <ul>

            </ul>
        </div>
    </div>
</body>

</html>