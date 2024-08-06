    <?php
    include "connection.php";
    session_start();
    // Process login attempt only for POST requests
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();

    // Fetch the user row
    if ($row = $result->fetch_assoc()) {
    // Redirect based on user type
    if ($row["usertype"] == "student") {

    $_SESSION['username']= $username;
    $_SESSION['usertype']= "student";//used to check if you try to login using search in url
    header("location:studentHome.php");

    } else if ($row["usertype"] == "admin") {
    $_SESSION['username']= $username;
    $_SESSION['usertype']= "admin";
    header("location:adminHome.php");
    }
    } else {
    // Handle invalid credentials

    $message = "Invalid username or password! "; // Provide a clearer error message
    $_SESSION['loginMessage'] = $message;
    header("location:login.php");
    }

    // Close the statement
    $stmt->close();
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
