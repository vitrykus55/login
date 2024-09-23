<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wait</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
global $conn;

require_once 'database.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                echo "<div class='alert alert-success'>Login successful. You will be redirected in 3 seconds.</div>";
                echo "<meta http-equiv='refresh' content='3;url=main.php'>";
//                var_dump('hello1');

                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Password doesn\'t match!</div>';

            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Email doesn\'t match.</div>';

        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Database error: ' . mysqli_error($conn) . '</div>';
    }

    mysqli_stmt_close($stmt);
}

if ($conn) {
    mysqli_close($conn);
}
?>

</body>
</html>
