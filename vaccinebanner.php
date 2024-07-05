<?php
include('db/connection.php');

session_start();

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: usermore/ulogin.php");
    exit();
}

$showA = $con->prepare("SELECT COUNT(*) AS ModernaCount FROM vaccines WHERE v_name = ?");
$vaccineName = "Moderna";
$showA->bindParam(1, $vaccineName);
$showA->execute();

$result = $showA->fetch(PDO::FETCH_ASSOC);
$modernaCount = $result['ModernaCount'];
$_SESSION['mdr'] = $modernaCount;

$showA = $con->prepare("SELECT COUNT(*) AS AstraZenecaCount FROM vaccines WHERE v_name = ?");
$vaccineName = "AstraZeneca";
$showA->bindParam(1, $vaccineName);
$showA->execute();

$result = $showA->fetch(PDO::FETCH_ASSOC);
$AstraZenecaCount = $result['AstraZenecaCount'];
$_SESSION['astr'] = $modernaCount;


$showA = $con->prepare("SELECT COUNT(*) AS SinopharmCount FROM vaccines WHERE v_name = ?");
$vaccineName = "Sinopharm";
$showA->bindParam(1, $vaccineName);
$showA->execute();

$result = $showA->fetch(PDO::FETCH_ASSOC);
$SinopharmCount = $result['SinopharmCount'];
$_SESSION['sino'] = $modernaCount;


$showA = $con->prepare("SELECT COUNT(*) AS SinovacCount FROM vaccines WHERE v_name = ?");
$vaccineName = "Sinovac";
$showA->bindParam(1, $vaccineName);
$showA->execute();

$result = $showA->fetch(PDO::FETCH_ASSOC);
$SinovacCount = $result['SinovacCount'];
$_SESSION['sivo'] = $modernaCount;

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


  <style>



.service-item {
    position: relative;
    height: 350px;
    padding: 0 30px;
    transition: .5s;
    padding: 30px;
  -webkit-box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.1);
  background: #fff; 
}

.service-item .service-icon {
    width: 150px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary);
    border-radius: 50%;
    transform: rotate(-14deg);
}

.service-item .service-icon i {
    transform: rotate(15deg);
}

.service-item a.btn {
    position: absolute;
    width: 60px;
    bottom: -48px;
    left: 50%;
    margin-left: -30px;
    opacity: 0;
}

.service-item:hover a.btn {
    bottom: -24px;
    opacity: 1;
}



  </style>
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
        <div class="row align-items-center">
          <div class="col-lg-6 mr-auto text-center text-lg-left">
            <h1 class="heading mb-3">Vaccine Info</h1>
            <p class="mb-5">Countries should continue to work towards vaccinating at least 70% of their populations, prioritizing the vaccination of 100% of health workers and 100% of the most vulnerable groups, including people who are over 60 years of age and those who are immunocompromised or have underlying health conditions</p>
            <p class="mb-4"><a href="vaccinations.php" class="btn btn-primary">Vaccination Form</a></p>



          </div>
          <div class="col-lg-6">
            <figure class="illustration">
              <img src="images/illustration.png" alt="Image" class="img-fluid">
            </figure>
          </div>
          
        </div>
      </div>
    </div>






<br>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-4 section-heading ">We Have Multiple vaccines</h1><hr>
            </div> <br> <br>


            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                  <a href="#Moderna">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="mb-3 section-heading">Moderna vaccine</h4>
                        <p class="m-0 text-dark">The Moderna vaccine very high effectiveness against severe disease.</p><hr>
                        <h5 class="text-primary font-weight-bold">Available vaccines  (<?php echo $modernaCount;  ?>) </h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <a href="#AstraZeneca">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="mb-3 section-heading">AstraZeneca vaccine</h4>
                        <p class="m-0 text-dark">The AstraZeneca vaccine has an efficacy of 72% against symptomatic.</p><hr>
                        <h5 class="text-primary font-weight-bold">Available vaccines  (<?php echo $AstraZenecaCount;?>) </h5>  
                      </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <a href="#Sinovac">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="mb-3 section-heading">Sinovac vaccine</h4>
                        <p class="m-0 text-dark">The Sinovac vaccine effective all individuals aged 18 or above.</p><hr>
                        <h5 class="text-primary font-weight-bold">Available vaccines  (<?php echo $SinovacCount ;?>) </h5>  
                      </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <a href="#Sinopharm">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <h4 class="mb-3 section-heading">Sinopharm vaccine</h4>
                        <p class="m-0 text-dark">The Sinopharm vaccine effective all individuals aged 18 or above.</p><hr>
                        <h5 class="text-primary font-weight-bold">Available vaccines  (<?php echo $SinopharmCount ;?>)</h5>  
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <figure class="img-play-vid">
                <img src="images/bannerv.jpg" alt="Image" class="img-fluid">
                <div class="absolute-block d-flex">
                  <span class="text">Watch the Video</span>
                  <a href="https://www.youtube.com/watch?v=9pVy8sRC440" data-fancybox class="btn-play">
                    <span class="icon-play"></span>
                  </a>
                </div>
              </figure>
            </div>
            <div class="col-lg-5 ml-auto">
              <h2 class="mb-4 section-heading">Covid-19 vaccines</h2>
              
              <p>Everyone, everywhere, should have access to COVID-19 vaccines.</p>
              <br>
              <p>WHO is determined to maintain the momentum for increasing access to COVID-19 vaccines and will continue to support countries in accelerating vaccine delivery, to save lives and prevent people from becoming seriously ill.</p>
              <p><a href="vaccinations.php" class="btn btn-primary">Fill The Form</a></p>
            </div>
          </div>
        </div>
      </div>
<div class="site-section bg-light">


    <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4 ">
            <h2 class="mb-4 section-heading" id="Moderna">Moderna vaccine</h2>
              <p>Very large clinical trials have shown that Moderna is effective in preventing and protecting against serious illness from COVID-19 in people aged 12 years and older. Adults who had 2 doses of Moderna were about 94% less likely to become ill from COVID-19 than people who did not get the vaccine Both of the mRNA vaccines available in the US are highly effective against severe COVID-19, but recent studies suggest that Moderna's elicits a stronger immune response and might be better at preventing breakthrough infections.</p>
            </div>
            <div class="col-lg-6  ml-auto">
              <h2 class="mb-4 section-heading" id="Sinovac">Sinovac vaccine</h2>
              <p>The vaccine is safe and effective for all individuals aged 18 and above. In line with the WHO Prioritization Roadmap and the WHO Values Framework, older adults, health workers and immunocompromised persons should be prioritised. The Sinovac vaccine can be offered to people who have had COVID-19 in the past A new study by researchers at Yale and the Dominican Republic finds the Sinovac vaccine offers little immune protection against the omicron variant Researchers found that the Sinovac vaccine was 60 per cent effective.</p>
            </div>
          </div>
        </div>
      </div><hr>
<div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-4 ">
            <h2 class="mb-4 section-heading" id="AstraZeneca">AstraZeneca vaccine</h2>
              <p>Very large clinical trials have shown that Moderna is effective in preventing and protecting against serious illness from COVID-19 in people aged 12 years and older. Adults who had 2 doses of Moderna were about 94% less likely to become ill from COVID-19 than people who did not get the vaccine Both of the mRNA vaccines available in the US are highly effective against severe COVID-19, but recent studies suggest that Moderna's elicits a stronger immune response and might be better at preventing breakthrough infections.</p>
            </div>
            <div class="col-lg-6  ml-auto">
              <h2 class="mb-4 section-heading" id="Sinopharm">Sinopharm vaccine</h2>
              <p>The vaccine is safe and effective for all individuals aged 18 and above. In line with the WHO Prioritization Roadmap and the WHO Values Framework, older adults, health workers and immunocompromised persons should be prioritised. The Sinovac vaccine can be offered to people who have had COVID-19 in the past A new study by researchers at Yale and the Dominican Republic finds the Sinovac vaccine offers little immune protection against the omicron variant Researchers found that the Sinovac vaccine was 60 per cent effective.</p>
            </div>
          </div>
        </div>
      </div>

<hr>





    <div class="site-section">
        <div class="container">

          <div class="row">
            <div class="col-lg-6 ">
              <div class="row mt-5 pt-5">
                <div class="col-lg-6 do ">
                  <h3>You should do</h3>
                  <ul class="list-unstyled check">
                    <li>Stay at home</li>
                    <li>Wear mask</li>
                    <li>Use Sanitizer</li>
                    <li>Disinfect your home</li>
                    <li>Wash your hands</li>
                    <li>Frequent self-isolation</li>
                  </ul>
                </div>
                <div class="col-lg-6 dont ">
                  <h3>You should avoid</h3>
                  <ul class="list-unstyled cross">
                    <li>Avoid infected people</li>
                    <li>Avoid animals</li>
                    <li>Avoid handshaking</li>
                    <li>Aviod infected surfaces</li>
                    <li>Don't touch your face</li>
                    <li>Avoid droplets</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <img src="images/protect.png" alt="Image" class="img-fluid">
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