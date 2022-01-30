<?php include_once 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RandomE - Contact</title>
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
      <li><a href="contact.php" class="active-top-nav">Contact</a></li>
      <li><a href="about-us.php">About Us</a></li>
    </ul>
  </nav>
  <div id="main">
    <h1 style="font-size:35px; text-decoration:underline; color:#fd4503; text-align:center">Contact</h1>
    <h3 style="text-align:center">As we want you to have a great experience on our website, we give you the opportunity to ask for support</h3>
    <h3>E-mail adress: <p style="text-decoration:underline; display:inline">support@randomeverything.net</span></p></h3>
    <h3>Write us an e-mail below</h3>
    <form class="contact-form" action="includes\contactform.php" method="post">
      <input type="text" name="name" placeholder="Full Name"><br>
      <input type="text" name="mail" placeholder="Your e-mail adress"><br>
      <input type="text" name="subject" placeholder="Subject"><br>
      <textarea name="message" rows="8" cols="80" placeholder="Message"></textarea><br>
      <button type="submit" name="submit">Send</button>
    </form>
    <h3 style="text-align:center">Follow us on social media</h3>
    <div style="background-color:#fd4503; padding:10px;">
      <h4 style="text-align:center">Get in touch with the latest updates and changes</h4>
      <div class="expand">
        <img src="images/instagram-contact.png" style="height:40px;">
        <a href="https://www.instagram.com/randomeverything.net2019/" target="_blank" style="line-height:34px; padding:3px; color:#eda74c; font-weight:bold">@randomeverything.net2019</a>
      </div>
      <div class="expand">
        <img src="images/facebook-contact.png" style="height:40px;">
        <a href="https://www.facebook.com/Random-Everything-113619730008111" target="_blank" style="line-height:34px; padding:3px; color:#eda74c; font-weight:bold">RandomEverything</a>
      </div>
    </div>
    <h3 style="text-align:center">Contact the developer</h3>
    <div style="background-color:#60b3fc; padding:10px; margin-bottom:30px">
      <h4 style="text-align:center">You might also consider giving me a follow :)</h4>
      <div class="expand">
        <img src="images/instagram-contact.png" style="height:40px;">
        <a href="https://www.instagram.com/ioan.grasu.24/" target="_blank" style="line-height:34px; padding:3px; font-weight:bold">@ioan.grasu.24</a>
      </div>
      <div class="expand">
        <img src="images/facebook-contact.png" style="height:40px;">
        <a href="https://www.facebook.com/ioan.grasu.79" target="_blank" style="line-height:34px; padding:3px;; font-weight:bold">facebook.com/ioan.grasu.79</a>
      </div>
      <div class="expand">
        <img src="images/gmail-contact.png" style="height:40px;">
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=grasu.ioan02@gmail.com" target="_blank" style="line-height:34px; padding:3px; font-weight:bold">grasu.ioan02@gmail.com</a>
      </div>
    </div>
  </div>https://www.facebook.com/ioan.grasu.79
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
      &copy; 2019 - <?php echo date("Y");?> - Random Everything
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
