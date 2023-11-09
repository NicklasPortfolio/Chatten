<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatten</title>
    <link rel="stylesheet" href="./css/chat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        <section class="container">
            <table class="table table-dark">
                <tbody>
                    <?php foreach ($results as $result) { ?>
                        <tr>
                            <th scope="row">
                                <?= $result[""] ?>
                            </th>
                        </tr>
                </tbody>
            </table>
        </section>
        <?php
} else {
    ?>
        <h1>Not logged in</h1>
        <?php
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>