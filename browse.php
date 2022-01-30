<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RandomE - Browse</title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <style>
  .collapsible{
    font-size:30px;
    color:#4c8df5;
  }
  .collapsible:hover{
    color:#8aacb8;
  }
  .rand-categ-active{
    color:#8aacb8;
  }
  .link-box{
   margin-left: 30px;
   font-size:18px;
  }
  </style>
</head>
<body>
   <div class="title" id="title">
     <a href="index.php">
       <img id="logo-img-top" src="LogoRE1.png" style="height:100px;">
     </a>
   </div>
   <nav id="nav-bar" class="top-nav">
     <img id="logo-img-nav" src="LogoRE1.png" style="display:none; height:40px; padding-bottom:5px">
     <ul class="top-nav-buttons">
       <li><a href="index.php">Home</a></li>
       <li><a href="contact.php">Contact</a></li>
       <li><a href="about-us.php">About Us</a></li>
     </ul>
   </nav>
   <div id="main">
     <h1 style="font-size:35px; text-decoration:underline; color:#fd4503">Table of contents</h1>
     <?php include_once 'includes/dbrandomizer.php';
     $categs = array(); $aux=0;
     $abc = mysqli_query($conn, "SELECT name FROM categories"); while ($row = $abc->fetch_assoc()) {$categs[$aux++]=$row['name'];};
     $totalCateg = count($categs);
     sort($categs);
     for ($x=0; $x<$totalCateg; $x++){
       $blah; $row1;
       echo "<button class=\"collapsible\">".$categs[$x];$blah="'".$categs[$x]."'";
       $sqlRandTitle = mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE category=".$blah);
       $nr_values = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM randomizers_all WHERE category=".$blah));
       echo "&nbsp;(".$nr_values.")<span class=\"triangle-up\">&#9662;</span></button>";
       echo "<div class=\"link-box\">";
       $sqlRand = mysqli_query($conn, "SELECT path FROM randomizers_all WHERE category=".$blah); while ($row = $sqlRand->fetch_assoc()) { echo "<div class=\"rand-link\"><a class=\"browse-link\"href=\"".$row['path']."\">"; $row1 = $sqlRandTitle->fetch_assoc(); echo $row1['title_name']."</a></div>";};
       echo "</div>";
     }
    ?>
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
      &copy; 2019 - <?php echo date("Y");?> - Random Everything
    </div>
    <button type="button" name="gototop" onclick="scrollToTop()" id="goToTop-btn">^</button>
  </footer>
  <script src="js files\navscripts.js"></script>
  <script src="js files\collapsible.js"></script>
</body>
</html>
