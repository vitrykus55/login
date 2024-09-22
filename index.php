<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="container">
    <?php
    if (isset($_POST['submit'])) {
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['repeat_password'];

        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        $errors = array();

        if (empty($fullName) || empty($email) || empty($password)) {
            array_push($errors, "All fields are required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        }

        if (strlen($password) < 6) {
            array_push($errors, "Password must be at least 6 characters");
        }

        if ($password != $passwordRepeat) {
            array_push($errors, "Passwords do not match");
        }

        // database connection
        require_once 'database.php';

        // check if email already exists
        $sql = 'SELECT * FROM user WHERE email = ?';
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                array_push($errors, "This email is already registered");
            }
        } else {
            die('Something went wrong: ' . mysqli_error($conn));
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' role='alert'>$error</div>";
            }
        } else {
            // insert new user into the database
            $sql = 'INSERT INTO user (name, email, password) VALUES (?, ?, ?)';
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $password_hash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success' role='alert'>You are registered successfully.</div>";
            } else {
                die('Something went wrong: ' . mysqli_error($conn)); // provide more detailed error
            }
        }
    }
    ?>

    <form action="index.php" method="post" autocomplete="off">
        <div class="form-group">
            <input type="text" name="fullname" class="form-control" placeholder="Full Name" id="fullname">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Your Email" id="email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Your Password" id="password">
        </div>
        <div class="form-group">
            <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password"
                   id="repeat_password">
        </div>
        <div class="form-group">
            <div class="form-btn mt-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>

    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>


