<?php
require_once __DIR__.'/connection.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();

