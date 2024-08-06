<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="loginn.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="role">Role:</label><br>
        <select name="role" id="role">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
            <option value="parent">Parent</option>
            <option value="admin">Administrator</option>
        </select><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>



<?php
// Database connection
$hostname = 'localhost:3335';
$username = 'aviBM';
$password = 'one234avi';
$dbName = 'studM';
$conn = new mysqli($hostname, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Query the respective table based on the selected role
$table = '';
$dashboard = '';
switch ($role) {
    case 'student':
        $table = 'students';
        $dashboard = 'studentDash.php';
        break;
    case 'teacher':
        $table = 'teachers';
        $dashboard = 'teacherDash.php';
        break;
    case 'parent':
        $table = 'parents';
        $dashboard = 'parentDash.php';
        break;
    case 'admin':
        $table = 'administrators';
        $dashboard = 'adminHome.php';
        break;
}

$sql = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User authenticated successfully
    header("Location: $dashboard");
    exit();
} else {
    // Authentication failed
    echo "Login failed. Please check your credentials.";
}

$conn->close();
?>
