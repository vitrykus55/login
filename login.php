<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="container">

    <?php

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once 'database.php';

        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
//                echo 'Stored Password Hash: ' . $user['password'] . '<br>'; // Хеш з бази даних
//                echo 'Entered Password: ' . $password . '<br>'; // Введений пароль

                if (password_verify($password, $user['password'])) {
                    header("Location: main.php");
                    exit();
                } else {
                    echo '<div class="alert alert-danger" role="alert">Password doesn\'t match.</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Email doesn\'t match.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Database error: ' . mysqli_error($conn) . '</div>';
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>


    <form action="login.php" method="post">
        <div class="form-group">
            <label>
                <input type="email" placeholder="Your Email " name="email" class="form-control">
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="password" placeholder="Your password " name="password" class="form-control">
            </label>
        </div>
        <div class="form-group">
            <div class="form-btn">
                <input type="submit" value="login" name="login" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>