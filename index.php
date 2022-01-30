<?php include 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RandomE - Home</title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script async src="https://cse.google.com/cse.js?cx=017816948399092297243:em74qcz92kf"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-4286438825864471",
      enable_page_level_ads: true
    });
  </script>
</head>
<body>
   <div class="title" id="title">
     <a href="index.php">
       <img id="logo-img-top" src="LogoRE1.png" style="height:100px;">
     </a>
     <p style="float:right"></p>
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
       <div class="google-search">
         <div class="gcse-search">

         </div>
       </div>
       <li><a href="index.php" class="active-top-nav">Home</a></li>
       <li><a href="contact.php">Contact</a></li>
       <li><a href="about-us.php">About Us</a></li>
     </ul>
   </nav>
   <div id="welcome-bar">
     <p class="welcome-title" style="font-size:8vw;margin:0; padding-top:7%;">Random Everything</p>
     <p class="welcome-motto" style="font-size:3vw; margin:5%;">~ The place where you can randomize 'em all ~</p>
   </div>
   <?php
    $non_pop_id = array(); $aux =0;
    $cv =mysqli_query($conn, "SELECT nrcrt FROM randomizers_all WHERE category!='Popular'"); while ($row = $cv->fetch_assoc()) { $non_pop_id[$aux++]=$row['nrcrt'];};
    $totalRands = count($non_pop_id);
    for ($x=0; $x<6; $x++){
      $aux = rand(0,$totalRands-1);
      for($y=0; $y<$x; $y++){
        while($rand_id[$y]==$non_pop_id[$aux]){
          $aux=rand(0,$totalRands-1);
          $y=0;
        }
      }
      $rand_id[$x]=$non_pop_id[$aux];
    }
    $aux=0;
    $popularRands = array();
    $popularRandsCheck = array();
    $populars= mysqli_query($conn, "SELECT nrcrt FROM randomizers_all WHERE category='Popular'"); while ($row = $populars->fetch_assoc()) { $popularRands[$aux++]=$row['nrcrt'];};
    $totalPopulars = sizeof($popularRands);
    for($x=0; $x<$totalPopulars; $x++) $popularRandsCheck[$x]=1;
    $aux = rand(0,$totalPopulars-1);
    function generatePopularRand(){
      $GLOBALS['popularRandsCheck'][$GLOBALS['aux']]=0;
       do{
         $GLOBALS['aux']= rand(0,$GLOBALS['totalPopulars']-1);
       }while($GLOBALS['popularRandsCheck'][$GLOBALS['aux']]===0);
    }
   ?>
   <div id="main">
     <div style="display:flex;" class="introduction">
       <div class="column">
         <img src="images\notepad.png" style="height:30px;">
         <h2 style="display:inline-block;">Who are we ?</h2>
         <p style="text-align:center; font-size:20px">Random Everything is a collection of list generators and random pickers, some of the popular ones being the <a href="numbers.php" style="text-decoration:underline">Random Number Generator</a>, <a href="color.php" style="text-decoration:underline">Random Color Picker</a>, <a href="team-picker.php" style="text-decoration:underline">Random Team Picker</a> and <a href="browse.php" style="text-decoration:underline; color:#fd4503">others</a>.</p>
         <p style="text-align:center"><a href="about-us.php" target="_blank" style="margin:0 auto; color:#fd4503; font-size:20px">See the story</a></p>
       </div>
       <div class="column">
         <img src="images\shuffle.png" style="height:30px;">
         <h2 style="display:inline-block;">What do we do ?</h2>
         <p style="text-align:center; font-size:20px; display:block;">When you need to generate a list of random values, whether you are working on a project or you just want to let someone pick for you, Random Everything got you covered.</p>
       </div>
     </div>
     <h1 style="font-size:35px; text-decoration:underline; color:#fd4503;text-align:center">Discover some of the content available</h1>
     <div class="related-row">
       <div class="related-column">
         <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
           <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
         <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];};?></p>
       </div>
       <?php
       generatePopularRand();
       ?>
       <div class="related-column">
         <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
           <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
         <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];};?></p>
       </div>
       <?php
       generatePopularRand();
       ?>
       <div class="related-column">
         <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
           <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
         <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$popularRands[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];};?></p>
       </div>
       <?php
       $aux=0;
       ?>
       <div id="related-seemore">
         <div class="related-column">
           <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
             <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
           <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];}; $aux++;?></p>
         </div>
         <div class="related-column">
           <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
             <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
           <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];}; $aux++;?></p>
         </div>
         <div class="related-column">
           <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
             <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
           <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];}; $aux++;?></p>
         </div>
         <div class="related-column">
           <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
             <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
           <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];}; $aux++;?></p>
         </div>
         <div class="related-column">
           <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
             <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
           <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];}; $aux++;?></p>
         </div>
         <div class="related-column">
           <a href="<?php $sqlPath= mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlPath->fetch_assoc()) { echo $row['path'];};?>">
             <?php $sqlTitle= mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title_name'];};?></a><br>
           <p>&nbsp;&nbsp;<?php $sqlDescr= mysqli_query($conn, "SELECT small_description FROM randomizers_all WHERE nrcrt=".$rand_id[$aux]); while ($row = $sqlDescr->fetch_assoc()) { echo $row['small_description'];}; $aux++;?></p>
         </div>
       </div>
     </div>
     <button onclick="seeMore()" id="seemore-btn" >See more</button>
    <h1 style="font-size:35px; text-decoration:underline; color:#fd4503;text-align:center">Get to know the power of "Random"</h1>
      <div class="split left">
        <img src="images/dice.jpg" style="width:100%;">
      </div>
      <div class="split right" style="min-height:200px;">
        <div class="centered">
          <h2>Try one of our <?php include 'includes/dbrandomizer.php'; echo "<b style=\"color:#ffa500\">".mysqli_num_rows(mysqli_query($conn, "SELECT * FROM randomizers_all"))."</b>";?>  randomizers available for anyone !</h2>
          <a href="browse.php" style="line-height:50px;font-size:2vh; font-weight:bold; background-color:#fd4503; padding:10px 20px; border-radius:10px">Browse</a>
        </div>
      </div>
    <h1 style="font-size:35px; text-decoration:underline; color:#fd4503;text-align:center">Keep the rust away ! </h1>
    <div class="split right">
      <img src="images/rusty-teeth-wheels.jpg" style="width:100%;">
    </div>
    <div class="split left">
      <div class="centered">
        <h2 style="margin:0">Show your support !</h2>
        <p>Every feature on this website is free, but you can show your support by gifting any amount so we can maintain this platform working and developing.</p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick" />
          <input type="hidden" name="hosted_button_id" value="NCS46PN4LG6XU" />
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
          <img alt="" border="0" src="https://www.paypal.com/en_RO/i/scr/pixel.gif" width="1" height="1" />
        </form>
        <p>*Note that donations <b style="text-decoration:underline">are needed but never requested</b> ! Donations are an advanced level of support you can deliver to us!</p>
      </div>
    </div>
    <div>
      <h2>This version might be slightly unstable</h2>
      <p>&nbsp;&nbsp;As we've just launched the first version of the website, a lot of features might be unstable so we ask you to report any issues that you are experiencing while using our website, using <a href="contact.php" style="color:#fd4503; text-decoration:underline">this contact form</a>, or by using the dedicated contact page for our generators, you can find it <a href="randomizer-feedback.php" style="color:#fd4503; text-decoration:underline">here</a>.</p>
    </div>
    <br>
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
      <div class="footer-link-box"><a href="privacy-policy.php">Privacy Policy</a></div><br>
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
  <script src="js files\collapsible.js"></script>
  <script>
    function openSideMenu(){
      document.getElementById('side-menu').style.width='350px';
    }
    function closeSideMenu(){
      document.getElementById('side-menu').style.width='0px';
    }
    function seeMore(){
      var moreRands = document.getElementById("related-seemore");
      var moreBtn = document.getElementById("seemore-btn");
      if (moreBtn.innerHTML === "See less"){
        moreRands.style.display = "none";
        moreBtn.innerHTML = "See more"
      } else {
        moreRands.style.display = "block";
        moreBtn.innerHTML = "See less";
      }
    }
    window.onscroll = function() {nav_stick()};
    var navbar = document.getElementById('nav-bar');
    var sideMenu = document.getElementById('side-menu');
    var logoTop = document.getElementById('logo-img-top');
    var logoNav = document.getElementById('logo-img-nav');
    var welcomeBar = document.getElementById('welcome-bar')
    var sticky = navbar.offsetTop;
    function nav_stick() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add('sticky');
        logoTop.style.display = 'none';
        logoNav.style.display = 'inline';
        sideMenu.style.marginTop='0';
        sideMenu.style.position='fixed';
        sideMenu.style.height='100%';
        welcomeBar.style.marginTop = '70px';
      } else {
        navbar.classList.remove('sticky');
        logoTop.style.display = 'block';
        logoNav.style.display = 'none';
        sideMenu.style.marginTop='100px';
        sideMenu.style.position='absolute';
        welcomeBar.style.marginTop = '20px';
      }
    }
    function scrollToTop(){
      document.querySelector('.title').scrollIntoView({
      behavior: 'smooth'
    });
    }
    $(document).ready(nav_stick());
  </script>
</body>
</html>
