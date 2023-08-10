<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projects";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // Query to check user credentials
    $sql = "SELECT * FROM user WHERE phone = ? AND password = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $phone, $password);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        echo "Login successful. Welcome, " . $phone . "!";
        header("Location: index.php");
    } else {
        echo "Login failed. Please try again.";
    }
    
    $stmt->close();
}

$conn->close();
?>

<form method="post" action="">
    Phone: <input type="text" name="phone"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
<br>
<a href="welcome.php">Go Back</a>

</body>
</html>