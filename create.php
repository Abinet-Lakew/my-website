<?php

// Database credentials (replace with your actual details)
$servername = "localhost:3335"; // Assuming default port (3306)
$username = "aviBM";
$password = "one234avi";
$dbname = "student-mana";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// SQL statements for creating tables (fixed parentheses, no foreign keys)
$sql_all_tables = "
CREATE TABLE grade_reports (
  report_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  semester VARCHAR(50) NOT NULL,
  year INT NOT NULL
);

CREATE TABLE grade_results (
  result_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  report_id INT NOT NULL,
  course_id INT NOT NULL,
  grade VARCHAR(10) NOT NULL
);

CREATE TABLE fees (
  fee_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  student_id INT NOT NULL,
  semester VARCHAR(50) NOT NULL,
  year INT NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  due_date DATE NOT NULL,
  payment_status ENUM('Paid', 'Unpaid', 'Partially Paid') NOT NULL
);
";

// Execute all CREATE TABLE statements at once
if (mysqli_multi_query($conn, $sql_all_tables)) {
  do {
    if ($result = mysqli_store_result($conn)) {
      mysqli_free_result($result);
    }
  } while (mysqli_more_results($conn) && mysqli_next_result($conn));
  echo "Tables created successfully";
} else {
  echo "Error creating tables: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
