    <?php
    error_reporting(0);
    session_start();
    session_destroy();
    include 'connection.php';

    if($_SESSION['message']){
      $message =   $_SESSION['message'];
      echo"<script type='text/javascript'>
      alert('$message');
      </script>";
    }

    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student managemnt System</title>
    <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <nav>
    <img src="IMAGE/admas-logo.jpg" alt="log of Admas Univsiersty">

    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Admission</a></li>
        <li><a href="login.php" class="btn btn-success">Login</a></li>       
    </ul>
    </nav>
    <div class="section1">
    <label for="admas" class="img-text">WELL COME TO ADMAS UNIVERSITY STUDENT MANAGEMENT SYSTEM</label>
    <img class="main-image" src="IMAGE/smsbg.png" alt="">
    </div>

    
    <div id="about">
    <div class="continer">
        <div class="row">
            <div class="about-col-1">
            <img class="wellcome-img" src="IMAGE/admas-bulding.png" alt="admas university">
            </div>
            <div class="about-col-2">

                <h1 class="sub-title1">About Us</h1>

                <p>
                    My name is Abinet Lakew. I was born in 2000 G.C in Gonder, Ethiopia. 
                    I completed my elementary education at Ase Bekefa Elementary School 
                    and my secondary education at Fasildes Secondary School, both in Gonder.
                    and  after completing 10th grade in 2017 started college 
                    at GT Technology College in 2018. After three years of studying, 
                    I graduated with a diploma in Database Level 4 in 2021. In the same year, 
                    I moved to Addis Ababa and started working as DJ. In 2022, 
                    I began pursuing a degree in Computer Science at Admas University
                     and am currently in my third year of study.
                    </p>
                    <br>
               <div class="tab-title">
                <p class="tab-links " onclick="opentab('tvt')">Available TVT Programs</p>
                <p class="tab-links" onclick="opentab('dgree')">Available Degree Programs</p>
                <p class="tab-links"onclick="opentab('phd')">Available Master Programs</p>
               </div>   
               <br>  
                <div class="tab-contents active-tab" id="tvt">
                Accounting <br>
                Markating <br>
                Bisuness Management <br>
                Database <br>
                    
                </div>   

                <div class="tab-contents" id="dgree">
                =>Database Design and Database Adminstratoe <br>
                =>Database Design and Database Adminstratoe <br>
                =>Database Design and Database Adminstratoe <br>
                =>Database Design and Database Adminstratoe <br>
                </div>   
                <div class="tab-contents" id="phd">
                =>Database Design and Database Adminstratoe <br>
                =>Database Design and Database Adminstratoe <br>
                =>Database Design and Database Adminstratoe <br>
                =>Database Design and Database Adminstratoe <br>
                </div>   
            </div>
        </div>
    </div>
</div>
           <script>
            var tablinks = document.getElementsByClassName("tab-links");
var tabcontents = document.getElementsByClassName("tab-contents");

function opentab(tabname){
  for(tablink of tablinks){
    tablink.classList.remove("active-link");
  }  
  for(tabcontent of tabcontents){
    tabcontent.classList.remove("active-tab");
  }  
  event.currentTarget.classList.add("active-link");/*for all color of llne */
  document.getElementById(tabname).classList.add("active-tab");

}

           </script>


         <div id="contact">
                <h1 class="sub-title2">Admission Form</h1>

            <div class="contact-right">
            <form action="data-check.php" method="POST" class="addmission-form">
                <input type="text" name="name" class="input-admi" placeholder="Your Name" required>
                <input type="email" name="email" class="input-admi"placeholder="Your Email" required>
                <input type="text" name="phone" class="input-admi" placeholder="Your phone" required>
                <textarea name="message"  rows="5" placeholder="Your Message"></textarea>
                <button type="submit" name="applay" class="btn btn2">Apply</button><!------btn and btn2 are the first class name and toke his property and add bt2 ..----->

            </form>
        
    </div>
    <div class="copyright">
        <p>copyright © avi</p><!---add heart and sign of copyright-->
    </div>
</div>



    </body>
    </html>