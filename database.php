<?php
$servername = "localhost";
$username = "root";
$password_db = "root";
$dbname = "logini_db";
$port = 3306;
$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

$conn = new mysqli($servername, $username, $password_db, $dbname, $port, $socket);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
