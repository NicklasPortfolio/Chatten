<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatten</title>
    <link rel="stylesheet" href="./css/chat.css">
</head>


<?php
session_start();
if (isset($_SESSION["username"])) {
    ?>

    <body>
        <?php
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
        <?php
} else {
    ?>
        <h1>Not logged in</h1>
        <?php
}
?>
</body>

</html>