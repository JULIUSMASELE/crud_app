<?php
$id = $_GET['id'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'crud_app');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete item
$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
