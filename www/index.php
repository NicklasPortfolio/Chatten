<?php
session_start();
$_SESSION["username"] = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="vh-100 w-30">
            <form action="login.php" method="post" class="form-control bg-dark text-white p-4">
                <div class="col">
                    <div class="row">
                        <label>Username</label>
                        <input class="form-control" type="text" name="Username">
                    </div>
                    <div class="row">
                        <label>Password</label>
                        <input class="form-control" type="password" name="Password">
                    </div>
                    <div class="row">
                        <button class="btn btn-success mt-3" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>