<?php
require_once("../config/db_config_mysqli.php");
session_start();
$currUser = $_SESSION["username"];

$maxRows = false;

$query = "SELECT *, DATE_FORMAT(time, '%Y-%d-%m %H:%i') as formatted_time FROM messages";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Could not fetch any rows";
}

if ($result->num_rows >= 7) {
    $maxRows = true;
}
?>

<?php
if (isset($_POST["enter"])) {
    require_once("../config/db_config_mysqli.php");

    if ($maxRows) {
        $query = "DELETE FROM messages WHERE id = (SELECT MIN(id) FROM messages)";
        $stmt = $mysqli->prepare($query);
        if (!$stmt->execute()) {
            echo "Error occured: " . $mysqli->error;
        }
    }

    $message = $_POST["message"];

    $query = "INSERT INTO messages (username, message) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $currUser, $message);

    if (!$stmt->execute()) {
        echo "Error occured: " . $mysqli->error;
    }
    $stmt->close();
    $mysqli->close();
    header("Location: $_SERVER[REQUEST_URI]");
} else {
    echo "Did not find post data";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatten</title>
    <link rel="stylesheet" href="./css/chat.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .vh-100 {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<?php if (isset($_SESSION["username"])) { ?>

    <body class="bg-dark">
        <?php if ($_SESSION["username"] == "admin"): ?>
            <form action="register.php" method="post">
                <button class="button m-3" type="submit" name="submit">Register New User</button>
            </form>
        <?php endif; ?>
        <section class="container">
            <h2 class="text-white">Logged in as:
                <?= $currUser ?>
            </h2>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">USER</th>
                        <th scope="col">MESSAGE</th>
                        <th scope="col">SENT AT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $row["username"] ?>
                            </th>
                            <td>
                                <?= $row["message"] ?>
                            </td>
                            <td>
                                <?= $row["formatted_time"] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
        <section>
            <div class="container d-flex justify-content-center align-items-center">
                <form class="form-control bg-dark text-white text-center p-4" action="#" method="post">
                    <div class="row">
                        <label>Message:</label>
                        <textarea class="form-control mb-2 mt-2" name="message" rows="5"></textarea>
                    </div>
                    <button class="btn btn-success px-5" type="submit" name="enter">Enter</button>
                </form>
            </div>
        </section>
    <?php } else { ?>
        <h1>Not logged in</h1>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>