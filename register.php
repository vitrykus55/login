<?php
global $conn;

if (isset($_POST['submit'])) {
    $fullName = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $passwordRepeat = $_POST['repeat_password'];

    $errors = [];

    if (empty($fullName)) {
        $errors[] = "Full Name is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (empty($passwordRepeat)) {
        $errors[] = "Repeat password is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if ($password !== $passwordRepeat) {
        $errors[] = "Passwords do not match";
    }

    require_once 'database.php';

    $sql = 'SELECT * FROM user WHERE email = ?';
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $errors[] = "This email is already registered";
        }
    } else {
        die('Something went wrong: ' . mysqli_error($conn));
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger' role='alert'>$error</div>";
        }
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO user (name, email, password) VALUES (?, ?, ?)';

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $password_hash);
            if (mysqli_stmt_execute($stmt)) {
                echo "<div class='alert alert-success' role='alert'>You are registered successfully.</div>";
                header("Location: login.php");
                exit();
            } else {
                die('Something went wrong: ' . mysqli_error($conn));
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
