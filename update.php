<?php
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'crud_app');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update item
    $sql = "UPDATE users SET name_='$name', email='$email', mobile='$mobile' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Retrieve the item to be updated
$conn = new mysqli('localhost', 'root', '', 'crud_app');
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center><h1>Update User</h1>
    <form method="post" action="">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($item['name_']); ?>" required>
        <br> <br>
        <label for="name">Email:</label>
        <input type="email" id="Email" name="email" value="<?php echo htmlspecialchars($item['email']); ?>" required>
        <br> <br>
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($item['mobile']); ?>" required></input>
        <br> <br>
        <input type="submit" value="Update User" >
    </form> <br>
    <a href="index.php"><button type="button">Back to List</button></a></center>
</body>
</html>
