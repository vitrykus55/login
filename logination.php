<?php
global $conn;

require_once 'database.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'hash.php';

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                echo "<div class='alert alert-success'>Вхід успішний. Ви будете перенаправлені через 3 секунди.</div>";
                echo "<meta http-equiv='refresh' content='3;url=main.php'>";
                var_dump('hello1');

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
