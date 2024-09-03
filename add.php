<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $passwd = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'crud_app');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert item
    $sql = "INSERT INTO users (name_, email ,mobile,passwd) VALUES ('$name', '$email' ,'$mobile', '$passwd')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center><h1>Add New User</h1>
    <form method="post" action="">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="Email">Email:</label>
        <input type="email" id= "Email" name="email" required> <br><br>
        
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" placeholder="+2557xxxx" required>    

        <label for="password">Mobile:</label>
        <input type="password" id="password" name="password"  required>    

            <br><br>  
       <input type="submit" value="Save">
    </form>
    <a href="index.php"><button type="button">View List</button></a></center>   
</body>
</html>
