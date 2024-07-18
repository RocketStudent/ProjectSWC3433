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
    $projectId = $_POST['project_id'];

    $sql = "DELETE FROM projects WHERE id='$projectId'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Project removed successfully.";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }
    header("Location: admindashboard.php");
    exit;
}
$conn->close();
?>
