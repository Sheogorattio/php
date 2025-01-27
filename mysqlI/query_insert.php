<?php
require_once __DIR__.'/connection.php';


$sql = "INSERT INTO users (name, email) VALUES ('John Doe', 'johndoe@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
