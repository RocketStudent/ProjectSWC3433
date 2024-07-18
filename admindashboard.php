<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: adminlogin.html");
    exit;
}

if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link href="../styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <h3>Add a Project</h3>
    <form action="adminaddproject.php" method="post">
        <input type="text" name="project_title" placeholder="Project Title" required>
        <textarea name="project_description" placeholder="Project Description" required></textarea>
        <input type="submit" value="Add Project">
    </form>

    <h3>Remove a Project</h3>
    <form action="adminremoveproject.php" method="post">
        <input type="text" name="project_id" placeholder="Project ID to Remove" required>
        <input type="submit" value="Remove Project">
    </form>
    <a href="adminlogout.php">Logout</a>
</body>
</html>