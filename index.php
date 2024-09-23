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
    require_once 'register.php';
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


