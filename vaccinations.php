<?php
include('db/connection.php');


session_start();

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location:usermore/ulogin.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
  <title>Covidex.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="fonts/flaticon-covid/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">
<div class="container">
  <div class="row align-items-center">

    <div class="col-6 col-xl-2">
      <div class="mb-0 site-logo"><a href="index.php" class="mb-0">Covidex<span class="text-primary">.</span> </a></div>
    </div>

    <div class="col-12 col-md-10 d-none d-xl-block">
    <nav class="site-navigation position-relative text-right" role="navigation">
  <ul class="site-menu main-menu js-clone-nav  p-0 mr-auto d-none d-lg-block">
    <li class="active"><a href="index.php" class="nav-link">Home</a></li>
    <li><a href="prevention.php" class="nav-link">Prevention</a></li>
    <li><a href="symptoms.php" class="nav-link">Symptoms</a></li>
    <li><a href="vaccinebanner.php" class="nav-link">Vaccine</a></li>
    <li><a href="about.php" class="nav-link">About</a></li>
    <li><a href="contact.php" class="nav-link">Contact</a></li>
    <li class="has-children">
      <a href="#" class="nav-link">Join us</a>
      <ul class="dropdown">
        <li><a href="../Covid-199/usermore/uregister.php" class="nav-link">sign up</a></li>
        <li><a href="../Covid-199/usermore/ulogin.php" class="nav-link">sign in</a></li>
      </ul>
    </li>
    <li class="has-children">
      <a href="#" class="nav-link"><?php echo isset($_SESSION['shownav']) ? $_SESSION['shownav'] : 'dxzzi'; ?></a>
      <ul class="dropdown">
        <li><a href="../Covid-199/usermore/ulogout.php" class="nav-link">Logout</a></li>
      </ul>
    </li>
  </ul>
</nav>

    </div>


    <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

  </div>
</div>

</header>


    <div class="hero-v1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 text-center mx-auto">
            
            <h1 class="heading mb-3">Vaccination Form</h1>
            <p class="mb-5">COVID-19 Vaccine Self-Certification Form !</p>
          </div>
          
        </div>
      </div>
    </div>
    <!-- MAIN -->

    

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <form   method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="fname">First name</label>
                    <input type="text" name="fname" id="fname" required class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="lname">Last name</label>
                    <input type="text" name="lname" id="lname" required class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="subject">Address</label>
                    <input type="text" name="add1" id="subject" required class="form-control">
                  </div>
                </div>
              </div>

              
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="subject">Address 2</label>
                    <input type="text" name="add2" id="subject1" required class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="fname">City</label>
                    <input type="text" name="city" id="fname" required class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="lname">State/Province</label>
                    <input type="text" name="state" id="lname" required class="form-control">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="fname">Age</label>
                    <input type="number" name="agexi" id="age"  required class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="lname">Date Of Birth</label>
                    <input type="date" name="birth" id="birthday" required name="birthday" class="form-control">
                  </div>
                </div>
              </div>


  
              <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Select Vaccine</label>
             <select class="form-control" name="vaccinex"   id="exampleFormControlSelect1">
                 <option value="Moderna" >Moderna</option>
                 <option value="Sinovac">Sinovac</option>
                 <option value="AstraZeneca">AstraZeneca</option>
                 <option value="Sinopharm">Sinopharm</option>
             </select>
             </div>
               </div>
            
           <div class="col-lg-6">
           <div class="form-group">
             <label for="fname">Phone No.</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">+92</div>
        </div>
        <input type="number" name="phonex" required class="form-control" id="inlineFormInputGroupUsername" placeholder="000-101000">
      </div>
    

           </div>
           </div>
          </div>

          <div class="row">
  <div class="col-lg-12 m-2">
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input"  type="radio" name="gnderx"  required  id="flexRadioDefault1" value="Male" >
        <label class="form-check-label" for="flexRadioDefault1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gnderx" required  id="flexRadioDefault2" value="Female" >
        <label class="form-check-label" for="flexRadioDefault2">
          Female
        </label>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">
    <input type="submit" name="savedata" class="btn btn-primary" value="Submit">
  </div>
</div>

</form>
</div>




<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

$vmail = new PHPMailer(true);

if (isset($_POST['savedata'])) {
  $na = $_POST['fname'];
  $nb = $_POST['lname'];
  $nc = $_POST['email'];
  $nd = $_POST['add1'];
  $ne = $_POST['add2'];
  $nf = $_POST['city'];
  $ng = $_POST['state'];
  $nh = $_POST['birth'];
  $ngr = $_POST['gnderx'];
  $nvcn = $_POST['vaccinex'];
  $nphn = $_POST['phonex'];
  $ngx = $_POST['agexi'];

  $res = $con->prepare("INSERT INTO `vaccination`(`u_fname`, `u_lname`, `u_email`, `u_address1`, `u_address2`, `u_city`, `u_state`, `u_birth`, `u_gender`, `u_vaccinex`, `u_phone`, `u_age`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
  $res->bindParam(1, $na);
  $res->bindParam(2, $nb);
  $res->bindParam(3, $nc);
  $res->bindParam(4, $nd);
  $res->bindParam(5, $ne);
  $res->bindParam(6, $nf);
  $res->bindParam(7, $ng);
  $res->bindParam(8, $nh);
  $res->bindParam(9, $ngr);
  $res->bindParam(10, $nvcn);
  $res->bindParam(11, $nphn);
  $res->bindParam(12, $ngx);
  $res->execute();

  try {
    $vmail = new \PHPMailer\PHPMailer\PHPMailer(); 
    $vmail->SMTPDebug = 0;
    $vmail->isSMTP();
    $vmail->Host = 'smtp.gmail.com';
    $vmail->SMTPAuth = true;
    $vmail->Username = '"please enter your email"';
    $vmail->Password = '"please enter your password secret key"';
    $vmail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; 
    $vmail->Port = 587;

    $vmail->setFrom($nc, $na . $nb);
    $vmail->addAddress($nc, $na);

    $vmail->isHTML(true);
    $vmail->Subject = 'Vaccination Confirmation';
    
    $vmail->Body = 'Dear ' . $na . ',<br><br>Thank you for registering for the vaccination. <br>


    Your Info:<br>
    Name: '. $na . " " . $nb . '<br>
    Email: ' . $nc . '<br>
    Address: ' . $nd . " " . $ne .  '<br>
    City: ' . $nf . '<br>
    State: ' . $ng . '<br>
    Phone: ' . $nphn . '<br>
    Age: ' . $ngx . '<br>
    Vaccine: ' . $nvcn . '<br>
    Your appointment is confirmed.';
    
    $vmail->send(); 
    echo '<script>alert("Your appointment is confirmed Please Check Your Email.")</script>';
  } catch (Exception $e) {
    echo '<script> Email could not be sent. Error.  </script>', $vmail->ErrorInfo;
  }

  $deleteStmt = $con->prepare("DELETE FROM vaccines WHERE v_name = ? LIMIT 1");
  $deleteStmt->bindParam(1, $nvcn);
  $deleteStmt->execute();
}
?>




          <div class="col-lg-5 ml-auto">
            <h3 class="mb-3 side-title">About vaccine</h3>
            <div class="quick-contact">

              <div class="d-flex">
                
                <address>
                  Fake street, 3929, London
                </address>
              </div>
              <div class="d-flex">
                <p>
                    Everyone, everywhere, should have access to COVID-19 vaccines.

WHO is determined to maintain the momentum for increasing access to COVID-19 vaccines and will continue to support countries in accelerating vaccine delivery, to save lives and prevent people from becoming seriously ill.

Countries should continue to work towards vaccinating at least 70% of their populations, prioritizing the vaccination of 100% of health workers and 100% of the most vulnerable groups, including people who are over 60 years of age and those who are immunocompromised or have underlying health conditions.
                </p>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="footer-heading mb-4">About</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi cumque tenetur inventore veniam, hic vel ipsa necessitatibus ducimus architecto fugiat!</p>
            <div class="my-5">
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="symptoms.php">Symptoms</a></li>
                  <li><a href="prevention.php">Prevention</a></li>
                  <li><a href="#">FAQs</a></li>
                  <li><a href="about.php">About Coronavirus</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Helpful Link</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Helathcare Professional</a></li>
                  <li><a href="#">LGU Facilities</a></li>
                  <li><a href="#">Protect Your Family</a></li>
                  <li><a href="#">World Health</a></li>
                </ul>
              </div>
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Resources</h2>
                <ul class="list-unstyled">
                  <li><a href="#">WHO Website</a></li>
                  <li><a href="#">CDC Website</a></li>
                  <li><a href="#">Gov Website</a></li>
                  <li><a href="#">DOH Website</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Covidex <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="www.dxzzi.com" target="_blank" >Dxzziest</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>


  <script src="js/main.js"></script>


</body>
</html>
