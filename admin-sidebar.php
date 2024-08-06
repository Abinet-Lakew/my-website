    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sidebar</title>
    <link rel="stylesheet" href="admin-style.css">
    <style>
         .admin-dash{
        font-size:20px;
        font-weight:bolder;
        margin-left:5%;
        background-color:green;
        color:white;
        padding:5px;
        border-style:dotted;
    }
    </style>
    </head>
    <body>
    <nav>
    <header class="header">
    <a href="#" class="admin-dash">Admin Dashboard</a>
    <div class="logout">
    <a href="logout.php" class="btn-logout" >Logout</a>
    </div>
    </header>
    </nav>

    <aside >
    <ul>
    <li>
    <a  href="admission.php">  Admission</a>
    </li>
    <li>
        <a href="add-student.php">Add Student</a>
    </li>
    <li>
        <a href="view-student.php">View Student</a>
    </li>
    <li>
        <a href="add-teacher.php">Add Teacher</a>
    </li>
    <li>
        <a href="view-teacher.php">View Teacher</a>
    </li>
    <li>
        <a href="">Add Courses</a>
    </li>
    <li>
        <a href="">View Courses</a>
    </li>
    </ul>  
    </aside>
  


    </body>
    </html>