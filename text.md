<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css"> </head>
<body background="IMAGE/background.png" class="body-design">

    <center>
        <div class="form-design">

            <div class="backHome">
                <a href="index.php">Back to Home</a>
            </div>

            <center class="titel-design">
                Login Form
            </center>

            <form action="login-check.php" method="POST" class="login-form">

                <div>
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="">-- Select Role --</option>
                        <option value="student">Student</option>
                        <option value="admin">Admin</option>
                        <option value="faculty">Faculty</option>
                    </select>
                </div>

                <div>
                    <label class="labl-design">Username:</label>
                    <input type="text" class="input-log" name="username" required>
                </div>

                <div>
                    <label class="labl-design">Password:</label>
                    <input type="password" class="input-log" name="password" required>
                </div>

                <div>
                    <button type="submit" class="btn-login">Login</button>
                </div>

                <h4>
                    <?php
                        session_start();

                        // Display login message (if any) and destroy session to prevent persistence
                        if (isset($_SESSION['loginMessage'])) {
                            echo $_SESSION['loginMessage'];
                            unset($_SESSION['loginMessage']);
                        }
                    ?>
                </h4>

            </form>
        </div>
    </center>

</body>
</html>


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3335
-- Generation Time: May 09, 2024 at 08:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student-mana`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(250) NOT NULL,
  `phone` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'aviBM', 947791723, 'abintblac@gmail.com', 'admin', 'one234avi'),
(3, 'avi', 947791723, 'abinet@gmail.com', 'student', '1212'),
(4, 'Ayinadis', 927595561, 'seble@gmail.com', 'student', '0202'),
(5, 'Abinet', 2147483647, 'abinet@gmail.com', 'student', '025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
