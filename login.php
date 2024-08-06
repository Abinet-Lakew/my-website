        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <style>
        h4{
        background-color: #dc3545;
        margin-top:20px;
        width:70%;
        color: #fff;
       
        }
        .backHome a{
                background-color:black;
                text-decoration:none;
                color:yellow;
                padding:2px;

        }
        input{
            padding: 4px;
            width:50%;
            border-radius:5px;
            border-style:none;
        }
        label{
                font-weight:bold;
                color:white;
        }

        
        </style>
        <link rel="stylesheet" href="style.css">
        
        </head>
        <body background="IMAGE/background.png" class="body-design">
               
        
        <center>
        <div class="form-design"> 

        <div class="backHome">
        <a href="index.php">Back to Home</a>
        </div>

        
        <center class="titel-design">
        Login Form


        </center>
        <form action="login-check.php" method="POST"  class="login-form">

        <div>
        <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="">-- Select Role --</option>
                    <option value="admin">Student</option>
                    <option value="student">Admin</option>
                    <option value="faculty">Faculty</option>
                </select>
        </div>


        <div>
        <label class="labl-design ">Username:</label>
        <input type="text" class="input-log"name="username" required>
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
        error_reporting(0);
        echo $_SESSION['loginMessage'];
        session_destroy();
        ?>
        </h4>

        </form>
        </div>
        </center>

        </body>
        </html>