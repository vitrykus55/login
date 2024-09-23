<?php
$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "logini_db";
$port = 3306;
$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

try {
    $conn = new mysqli($servername, $username, $password_db, $dbname, $port, $socket);

    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    echo "<div class='alert alert-danger' role='alert'>$error</div>";
}
