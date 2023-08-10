<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<?php
// Initialize variables to store form data
$id = $name = $phone = $password = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and store form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Create a database connection
    $conn = new mysqli('localhost', 'root', '', 'projects');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO users (id, name, phone, password) VALUES ('$id', '$name', '$phone', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<h2>Update Project Details</h2>
<form method="post">
    <label for="id">ID:</label><br>
    <input type="varchar" id="id" name="id"><br><br>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br><br>
    <label for="phone">Phone:</label><br>
    <input type="int" id="phone" name="phone"><br><br>
    <label for="password">password:</label><br>
    <input type="varchar" id="password" name="password"><br><br>
    <input type="submit" value="Submit">
</form>
<br>
<a href="welcome.php">Go Back</a>
</body>
</html>