<?php include_once 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Random Color</title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <style>
    #color-pallete {
      padding: 5px 10px;
      font-size: 15px;
    }
    #color-span{
      width: 60px;
      height: 25px;
      display: table-cell;
    }
    #color-div{
      display: none;
      font-size:20px;
      margin-bottom: 3px
    }
    #color-sample {
      margin: 0 0 0 10px;
      padding-top: 5px
    }
    .color-image {
      -webkit-filter: grayscale(100%);
      filter:grayscale(100%);
      transition: all 0.4s;
    }
    .color-image:hover {
      -webkit-filter: grayscale(0%);
      filter:grayscale(0%);
    }
  </style>
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
    <h1 style="font-size:35px; text-decoration:underline; color:#fd4503">Random Color Generator</h1>
    <h2 style="margin: 20px 0 10px 10px">Choose the color reach (explained below):</h2>
    <form>
      <select id="color-pallete" name="color-pallete">
        <option value="4">The hole color spectrum</option>
        <option value="1">Primary colors</option>
        <option value="2">Primary + Secondary colors (primary colors mixed with each-other)</option>
        <option value="3">Primary + Secondary + Tertiary colors (primary colors mixed with secondary colors)</option>
      </select>
    </form>
    <h2 style="margin: 20px 0 0 10px">Newest color generated</h2>
    <div class="output-box" id="result" style="height: 25px; overflow-y:hidden">
      <div id="color-div">
        <div id="color-span"> </div>
        <p id="color-sample" style="font-weight:bold;"></p>
      </div>
    </div>
    <button type="submit" name="submit" style="margin-left:15px; margin-top:20px" onclick="generate()">Generate a new color</button>
    <button type="submit" name="submit" style="margin-left:15px; margin-top:20px" onclick="removeHistory()">Reset History</button>
    <h2 style="margin: 20px 0 0 10px">Color History</h2>
    <div class="output-box" id="history" style="max-height:230px; overflow-y:hidden; display:flex; flex-flow:column wrap">
    </div>
    <h2 style="margin: 20px 0 0 10px">Color categories</h2>
    <h3 style="text-decoration:underline; margin-top:15px">Primary colors</h3>
    <p>Primary colors are the 3 main colors from which all other colors can be obtained by mixing them. These are: red, yellow and blue.</p>
    <img src="images/primary-colors2.png" class="color-image"style="height:250px;">
    <h3 style="text-decoration:underline">Secondary colors</h3>
    <p>Secondary colors represent the colors obtained by mixing 2 of the primary colors together. These are: orange, purple and green.</p>
    <img src="images/secondary-colors2.png" class="color-image"style="height:350px;">
    <h3 style="text-decoration:underline">Tertiary colors</h3>
    <p>Tertiary colors are combinations of primary and secondary colors. There are six tertiary colors; red-orange, yellow-orange, yellow-green, blue-green, blue-violet, and red-violet.</p>
    <img src="images/tertiary-colors2.png" class="color-image"style="height:450px;">
    <?php
      $rands[0] = ""; $aux=0;
      $ceva = mysqli_query($conn, "SELECT nrcrt FROM randomizers_all WHERE category='Popular'"); while($row = $ceva->fetch_assoc()){$rands[$aux++]=$row['nrcrt'];}
      if($rands[0]!=""){
        echo "<div class=\"randomizer-suggestions\"><h2 style=\"text-align:center; text-decoration:underline\">Try out other randomizers from the 'Popular' category !</h2>";
        for($x=0; $x<$aux; $x++){
          $title = mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rands[$x])->fetch_assoc()['title_name'];
          $path = mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rands[$x])->fetch_assoc()['path'];
          if ($title !== "Random Clock Time") echo "<a href=\"".$path."\">".$title."</a><br>";
        }
        echo "</div>";
      }
    ?>
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
  <script src="js files\random-color.js"></script>
  <script src="js files\collapsible.js"></script>
  <script>
    function openSideMenu(){
      document.getElementById('side-menu').style.width='350px';
    }
    function closeSideMenu (){
      document.getElementById('side-menu').style.width='0px';
    }
    $(document).keyup(function(event) {
      if (event.keyCode === 13) {
        $("#submit").click();
      }
    });
  </script>
</body>
</html>
