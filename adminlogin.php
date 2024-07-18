<?php
session_start();
$servername = "localhost"; 
$username = "Danial";
$password = "danial01";
$dbname = "my_portfolio";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminUsername = $_POST['username'];
    $adminPassword = $_POST['password'];

    
    $sql = "SELECT * FROM admin WHERE username='$adminUsername' AND password='$adminPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header("Location: admindashboard.php"); 
    } else {
        echo "Invalid login credentials.";
    }
}
$conn->close();
?>
