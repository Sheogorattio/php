<?php

require_once __DIR__.'/connection.php';

$sql = "UPDATE users SET email='johndoe2@example.com' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
