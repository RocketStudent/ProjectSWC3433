<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: adminlogin.html");
    exit;
}

$servername = "localhost";
$username = "Danial";
$password = "danial01";
$dbname = "my_portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['project_title'];
    $description = $_POST['project_description'];

    $sql = "INSERT INTO projects (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "New project added successfully.";
    } else {
        $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: admindashboard.php");
    exit;
}
$conn->close();
?>
