<?php

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "shop";

// Об'єктно-орієнтований стиль
$conn = new mysqli($servername, $username, $password, $dbname);
// Перевірка підключення
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Процедурний стиль
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Перевірка підключення
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }