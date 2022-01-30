<?php include_once 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RandomE - Terms And Conditions</title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
  <div class="title">
    <a href="index.php">
      <img id="logo-img-top" src="LogoRE1.png" style="height:100px;">
    </a>
  </div>
  <nav id="nav-bar" class="top-nav">
    <span class="open-slide">
      <a onclick="openSideMenu()">
        <svg width="30" height="30">
          <path d="M0,5,30,5" stroke="#fd4503" stroke-width="5"/>
          <path d="M0,14,30,14" stroke="#fd4503" stroke-width="5"/>
          <path d="M0,23,30,23" stroke="#fd4503" stroke-width="5"/>
        </svg>
      </a>
    </span>
    <div id="side-menu" class="side-nav">
      <a class="btn-close" onclick="closeSideMenu()">&times;</a>
      <ul class="side-nav-buttons">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about-us.php">About Us</a></li>
      </ul><br>
      <p style="margin:0;">Browse:</p>
      <a href="browse.php" style="margin:10px;font-size: 20px; color: #ff723f; padding:1px 6px; text-decoration:underline">See all</a>
      <?php
      $categs = array(); $aux=0;
      echo "<button class=\"collapsible\">Popular";$blah="'Popular'";
      $sqlRandTitle = mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE category=".$blah);
      $nr_values = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM randomizers_all WHERE category=".$blah));
      echo "&nbsp;(".$nr_values.")<span class=\"triangle-up\">&#9662;</span></button>";
      echo "<div class=\"link-box\">";
      $sqlRand = mysqli_query($conn, "SELECT path FROM randomizers_all WHERE category=".$blah); while ($row = $sqlRand->fetch_assoc()) { echo "<li class=\"rand-link\"><a href=\"".$row['path']."\">"; $row1 = $sqlRandTitle->fetch_assoc(); echo $row1['title_name']."</a></li>";};
      echo "</div>";
      $abc = mysqli_query($conn, "SELECT name FROM categories WHERE name!='Popular'"); while ($row = $abc->fetch_assoc()) {$categs[$aux++]=$row['name'];};
      $totalCateg = count($categs);
      sort($categs);
      for ($x=0; $x<$totalCateg; $x++){
        $blah; $row1;
        echo "<button class=\"collapsible\">".$categs[$x];$blah="'".$categs[$x]."'";
        $sqlRandTitle = mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE category=".$blah);
        $nr_values = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM randomizers_all WHERE category=".$blah));
        echo "&nbsp;(".$nr_values.")<span class=\"triangle-up\">&#9662;</span></button>";
        echo "<div class=\"link-box\">";
        $sqlRand = mysqli_query($conn, "SELECT path FROM randomizers_all WHERE category=".$blah); while ($row = $sqlRand->fetch_assoc()) { echo "<li class=\"rand-link\"><a href=\"".$row['path']."\">"; $row1 = $sqlRandTitle->fetch_assoc(); echo $row1['title_name']."</a></li>";};
        echo "</div>";
      }
     ?>
    </div>
    <img id="logo-img-nav" src="LogoRE1.png" style="display:none; height:40px; padding-bottom:5px">
    <ul class="top-nav-buttons">
      <li><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="about-us.php">About Us</a></li>
    </ul>
  </nav>
  <div id="main">
    <h1 style="color:#fd4503; text-decoration:underline">Terms and Conditions ("Terms")</h1>
    <p>&nbsp;Last updated: August 28, 2019</p>
    <p>&nbsp;&nbsp;Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the http://192.168.1.47/randomeverything website (the "Service") operated by Random Everything ("us", "we", or "our").</p>
    <p>&nbsp;&nbsp;Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
    <p>&nbsp;&nbsp;By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. The Terms and Conditions agreement  for Random Everything has been created with the help of <a href="https://www.freeprivacypolicy.com/free-terms-and-conditions-generator/">FreePrivacyPolicy.com Terms and Conditions Generator</a>.</p>
    <h2>Links To Other Web Sites</h2>
    <p>&nbsp;&nbsp;Our Service may contain links to third-party web sites or services that are not owned or controlled by Random Everything.</p>
    <p>&nbsp;&nbsp;Random Everything has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Random Everything shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
    <p>&nbsp;&nbsp;We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
    <h2>Governing Law</h2>
    <p>&nbsp;&nbsp;These Terms shall be governed and construed in accordance with the laws of Romania, without regard to its conflict of law provisions.</p>
    <p>&nbsp;&nbsp;Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>
    <h2>Changes</h2>
    <p>&nbsp;&nbsp;We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
    <p>&nbsp;&nbsp;By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
    <h2>Contact Us</h2>
    <p>&nbsp;&nbsp;If you have any questions about these Terms, please <a href="contact.php" style="text-decoration:underline">contact</a> us.</p>
  </div>
  <footer id="footer">
    <div style="text-align: center; margin-top:30px">
      <a href="https://www.facebook.com/Random-Everything-113619730008111" target="_blank"><img src="images/facebook-contact.png" class="footer-contact-img"></a>
      <a href="https://www.instagram.com/randomeverything.net2019/" target="_blank"><img src="images/instagram-contact.png" class="footer-contact-img"></a>
    </div>
    <div class="footer-left">
      <h4 style="margin-bottom:10px; text-decoration:underline wavy #fd4503;">Useful links&nbsp;</h4>
      <div class="footer-link-box"><a href="index.php">Home</a></div>
      <div class="footer-link-box"><a href="contact.php">Contact</a></div>
      <div class="footer-link-box"><a href="about-us.php">About Us</a></div>
      <div class="footer-link-box"><a href="terms-and-conditions.php">Terms of Use</a></div>
      <div class="footer-link-box"><a href="privacy-policy.php">Privacy Policy</a></div>
    </div>
    <div class="footer-right">
      <h4 style="margin-bottom:10px; text-decoration:underline wavy #fd4503;">Basic contact information&nbsp;</h4>
      <p style="margin:0;">- If you have anything you want to say to us, don't hesitate! -</p>
      <p style="margin:0;">- Contact us via email, at: -</p>
      <a href ="https://mail.google.com/mail/?view=cm&fs=1&to=support@randomeverything.net" style="text-decoration:underline;" target="_blank">support@randomeverything.net</a>
    </div>
    <div style="text-align: center; width:100%; display:inline-block; font-size:10px; margin-top:20px">
      &copy; <?php echo date("Y");?> - Random Everyhing
    </div>
    <button type="button" name="gototop" onclick="scrollToTop()" id="goToTop-btn">^</button>
  </footer>
  <script src="js files\navscripts.js"></script>
  <script src="js files\collapsible.js"></script>
  <script>
    function openSideMenu(){
      document.getElementById('side-menu').style.width='350px';
    }
    function closeSideMenu (){
      document.getElementById('side-menu').style.width='0px';
    }
  </script>
</body>
</html>
