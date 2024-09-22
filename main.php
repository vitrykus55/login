<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Range Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="container">
    <h1>Welcome to Range Master!</h1>

    <?php
//    session_start();
//
//    if (!isset($_SESSION['user'])) {
//        header("Location: login.php");
//        exit();
//    }
//
//    $user = $_SESSION['user'];

    $user = 'Alex';
    $email = 'alex123@gmail.com';

    echo "<h3> Hello $user ! </h3>";
    echo "<p> Email: $email </p>";

//    echo "<h2>Hello, " . htmlspecialchars($user['name']) . "!</h2>";
//    echo "<p>Email: " . htmlspecialchars($user['email']) . "</p>";
    ?>

    <form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
