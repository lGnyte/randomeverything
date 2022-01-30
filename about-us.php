<?php include_once 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RandomE - AboutUs</title>
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
      <p style="margin:0;">Randomizers available:</p>
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
      <li><a href="about-us.php"class="active-top-nav">About Us</a></li>
    </ul>
  </nav>
  <div id="main">
    <h1 style="font-size:35px; text-decoration:underline; color:#fd4503">About Us</h1>
    <div class="about-logo" style="float:right; margin-left:30px;">
      <img src="LogoRE1.png" style="height:250px">
      <figcaption style="text-align:center">~<em> Official Logo</em>~</figcaption>
    </div>
    <h2>About Random Everything</h2>
    <p>&nbsp;&nbsp;The main goal of this website is to be the perfect environment for anyone who wants to get a random value or to generate a list of specific elements. It is receiving updates often and we are constantly adding more randomizers.</p>
    <h3 style="text-decoration:underline">This platform is constantly evolving !</h3>
    <p>&nbsp;&nbsp;You have the chance to help Random Everything grow by suggesting any randomizer you were unable to find, and we will develope it as soon as possible !</p>
    <form action="includes/suggestionsa.php" method="post">
      <input type="text" name="suggestion" placeholder="Type here...">
      <button type="submit" name="submit" style="position:absolute; padding:5px 10px; font-size: 15px" onclick="alert('Submission received ! \n Thank you !')">Submit</button>
    </form><br>
    <p>&nbsp;&nbsp;We are looking forward to adding as many randomizers as possible in order to extend our "collection". Currently, we have a total of
      <?php echo "<b style=\"color:#fd4503\">".mysqli_num_rows(mysqli_query($conn, "SELECT * FROM randomizers_all"))."</b>";?> different ranomizers available for anyone to use. Have you tried them all? *cough* you can find each <a href="browse.php" class="issues-link">here</a>, thank me later. *cough*
    </p>
    <p>&nbsp;&nbsp;If you have any other suggestion you want to share with us or just feel like helping us in another way, feel free and <a href="contact.php" class="issues-link">contact us</a>.</p>
    <h2>Get to know the developer</h2>
    <h3 style="color:#fd4503">Follow me on Instagram ! &#8722;&#62; <a href="https://www.instagram.com/ioan.grasu.24/" style="color:#ff0">@ioan.grasu.24</a></h3>
    <h3 style="text-decoration:underline">Short Bio</h3>
    <p>&nbsp;&nbsp;My name is Ioan Grasu. I am a 17 years old college student from Piatra Neamt, Romania. I study at the National College of Computer Science, currently in 11th grade. Devotion, team-working and curiosity are 3 of my strong points.</p>
    <h3 style="text-decoration:underline">How I got into Web Development</h3>
    <p>&nbsp;&nbsp;Back when I was in 9th grade, I wanted to enter the Web Development world, to see "what it has to offer". Unfortunately, the school schedule was kind of basic in this area as it focuses on other programming languages. I wanted to explore more than that, so I managed to get access to a free course on <a href="https://udacity.com/" class="issues-link">Udacity.com</a>, I think it was called "Google Developer Challenge Scholarship: Front-End Web Dev". There, I learned the basics of HTML, CSS and JavaScript. I really enjoyed surfing the courses and doing the exercise, shoutout to <a href="https://udacity.com/" class="issues-link">Udacity</a> for providing a really good user-experience ! Soon I realised that this may be my path !</p>
    <h3 style="text-decoration:underline">How the idea of 'Random Everything' came</h3>
    <p>&nbsp;&nbsp;While learning for an Excel certification, I needed a list of 20 random names , birth  dates and email adresses. As I didn't want to write them by hand, I spent some time looking for this kind of list generators online. Surfing for a couple of minutes, I wasn't able to find to find a proper program that would suit my needs. Therefore, I had to do exactly what I didn't want to, write them manually. While doing this, I thought to myself -"Why wouldn't I make a program that would do exactly this and maybe set up a website to help other people too ?"- I guess that's exactly what I did.<br>
    &nbsp;&nbsp;Oh, by the way, here are the three randomizers I mentioned earlier:</p>
    <ul>
      <li style="list-style-type: disc;"><a href="random-names.php">Random Name List Generator</a></li>
      <li style="list-style-type: disc;"><a href="random-emails.php">Random Email Adresses</a></li>
      <li style="list-style-type: disc;"><a href="random-dates.php">Random Dates</a></li>
    </ul>
    <h2>Website's Politics</h2>
    <ul>
      <li style="list-style-type: disc;"><a href="terms-and-conditions.php">Terms and Conditions</a></li>
      <li style="list-style-type: disc;"><a href="privacy-policy.php">Privacy Policy</a></li>
    </ul>
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
