<?php
include "connection.php"; // Include your database connection file

session_start();

// Process login attempt only for POST requests to prevent accidental form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = mysqli_real_escape_string($conn, $_POST['username']); // Sanitize username
  $password = mysqli_real_escape_string($conn, $_POST['password']); // Sanitize password
  $selectedRole = mysqli_real_escape_string($conn, $_POST['role']); // Sanitize selected role

  // Prepare and execute a query based on the selected role (prevents SQL injection)
  if ($selectedRole === 'admin') {
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
  } else if ($selectedRole === 'student') {
    $stmt = $conn->prepare("SELECT * FROM student WHERE username = ? AND password = ?"); // Use 'users' table for admins
  } else if ($selectedRole === 'teacher') {
    $stmt = $conn->prepare("SELECT * FROM teacher WHERE username = ? AND password = ?");
  } else {
    // Handle invalid role (optional: log error or display a message)
    die("Invalid role selected!"); // Terminate script execution
  }

  // Bind parameters and execute the query
  $stmt->bind_param("ss", $username, password_hash($password, PASSWORD_BCRYPT)); // Hash password for security
  $stmt->execute();

  $result = $stmt->get_result();

  // Fetch the user row
  if ($row = $result->fetch_assoc()) {
    // Verify password using password_verify() if hashing is used (replace if different)
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username; // Store username in session for convenience (avoid storing sensitive data like password)
      $_SESSION['usertype'] = $selectedRole; // Store the selected user type for further use

      // Redirect based on user type
      if ($selectedRole === 'student') {
        header("location:studentHome.php"); // Replace with student dashboard path
      } else if ($selectedRole === 'admin') {
        header("location:adminHome.php"); // Replace with admin dashboard path
      } else if ($selectedRole === 'faculty') {
        header("location:facultyHome.php"); // Replace with faculty dashboard path
      }
    } else {
      // Handle invalid password
      $message = "Invalid password for username: " . $username; // Provide a more specific error message
      $_SESSION['loginMessage'] = $message;
      header("location:login.php");
    }
  } else {
    // Handle invalid username
    $message = "Invalid username or username does not exist!"; // Provide a clearer error message
    $_SESSION['loginMessage'] = $message;
    header("location:login.php");
  }

  // Close the statement
  $stmt->close();

  // Close the database connection
  mysqli_close($conn);
}
