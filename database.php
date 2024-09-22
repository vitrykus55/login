<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "logini_db";
$port = 3306;
$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

$conn = new mysqli($servername, $username, $password, $dbname, $port, $socket);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
