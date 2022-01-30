<?php include_once 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Random Clock Time</title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <style>
  input[type=text]{
    float:right;
  }
  select {
    float:right;
  }
  #criterias {
    line-height: 35px;
    max-width: 400px;
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
      <div class="google-search">
      <li><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="about-us.php">About Us</a></li>
    </ul>
  </nav>
  <div id="main" style="line-height:30px">
    <h1 style="color:#fd4503; text-decoration:underline">Random Clock Time</h1>
    <h2>&nbsp;&nbsp;Randomizer settings:</h2>
    <div id="criterias">
      <label for="number-of-values">Number of generates:</label>
      <input type="number" name="number-of-values" placeholder="1" style="padding: 3px 6px;font-size: 15px;float:right;width:50px;" id="number-of-values" value="1"><br>
      <label for="hour-format">Time format: </label>
      <select class="select" name="hour-format" id="h-format">
        <option value="1" selected>hh:mm</option>
        <option value="2">hh:mm:ss</option>
        <option value="3">hh:mm:ss:ms</option>
        <option value="4">mm:ss:ms</option>
        <option value="5">ss:ms</option>
      </select><br>
    </div>
    <button type="submit" name="see-more" onclick=advanced() id="seemore-btn" style="float:none; color:#4c8df5; font-size:20px">More options &#9662;</button>
    <div id="advanced" style="height: 0px;">
      <button type="submit" name="submit" style="margin:5px;" onclick="resetMoreOptions()">Reset "More options"</button>
      <button type="submit" name="submit" style="margin:5px;" onclick="resetAll()">Reset all settings</button><br> *Any empty box will count as the default value*<br>
      <label style="text-decoration:underline; font-size:18px">Set intervals:</label><br>
      <div class="interval-box">
        Hour (0-23)<br>
        <label for="interval-hour-min">Min:</label>
        <input type="number" name="interval-hour-min" value="" style="width:35px" min="0" max="23" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
        <label for="interval-hour-max">Max:</label>
        <input type="number" name="interval-hour-max" value="" style="width:35px" min="0" max="23" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
      </div>
      <div class="interval-box">
        Minutes (0-59)<br>
        <label for="interval-minutes-min">Min:</label>
        <input type="number" name="interval-minutes-min" value="" style="width:35px" min="0" max="59" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
        <label for="interval-minutes-max">Max:</label>
        <input type="number" name="interval-minutes-max" value="" style="width:35px" min="0" max="59" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
      </div>
      <div class="interval-box">
        Seconds (0-59)<br>
        <label for="interval-seconds-min">Min:</label>
        <input type="number" name="interval-seconds-min" value="" style="width:35px" min="0" max="59" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
        <label for="interval-seconds-max">Max:</label>
        <input type="number" name="interval-seconds-max" value="" style="width:35px" min="0" max="59" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
      </div>
      <div class="interval-box">
        Milliseconds (0-99)<br>
        <label for="interval-milliseconds-min">Min:</label>
        <input type="number" name="interval-milliseconds-min" value="" style="width:40px" min="0" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
        <label for="interval-milliseconds-max">Max:</label>
        <input type="number" name="interval-milliseconds-max" value="" style="width:40px" min="0" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
      </div><br><br>
      <label style="text-decoration:underline; font-size:18px">Preset values (intervals won't count if a value is preset):</label><br>&nbsp;
      <label for="">Hour (0-23):</label>
      <input type="number" name="preset-hour" value="" style="width:35px;" min="0" max="23" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">&nbsp;&nbsp;
      <label for="">Minutes (0-59):</label>
      <input type="number" name="preset-minutes" value="" style="width:35px;" min="0" max="59" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">&nbsp;&nbsp;
      <label for="">Seconds (0-59):</label>
      <input type="number" name="preset-seconds" value="" style="width:35px;" min="0" max="59" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">&nbsp;&nbsp;
      <label for="">Milliseconds (0-99):</label>
      <input type="number" name="preset-milliseconds" value="" style="width:40px;" min="0" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2"><br><br>
      <label style="text-decoration:underline; font-size:18px">Operators</label><br>&nbsp;
      <input type="checkbox" name="spacing">
      <label for="spacing">Display each value on a separate line.</label><br>
      <label>~ Additional operator settings coming soon ~</label>
    </div>
    <h2>&nbsp;&nbsp;Your result:</h2>
    <textarea class="output-box" id="result" rows="10" cols="40" disabled style="resize:none;"></textarea><br>
    <button type="submit" name="submit" style="position:absolute; font-size: 10px; padding:0" onclick="copyText()">Copy to clipboard</button><br>
    <button type="submit" name="submit" id="submit" style="margin-left:15px;  margin-top: 5px;" onclick="generate()">Generate</button>
    <button type="submit" name="submit" style="margin-left:15px;  margin-top: 5px;" onclick='document.getElementById("result").innerHTML = "" '>Reset</button>
    <input type="checkbox" name="concat" checked>
    <label for="concat">Delete previous values on new generate</label>
    <p>If the output bugs out, the 'Reset' button should fix it. <a href="randomizer-feedback.php?rand-name=Random+Clock+Time" class="issues-link">Having issues?</a></p>
    <p>&nbsp;&nbsp;Be careful! The result may generate slower, depending on the number of values you want to generate. If it takes too long, try reopening the page and insert a smaller amount of values.</p>
    <?php
      $rands[0] = ""; $aux=0;
      $ceva = mysqli_query($conn, "SELECT nrcrt FROM randomizers_all WHERE category='Time'"); while($row = $ceva->fetch_assoc()){$rands[$aux++]=$row['nrcrt'];}
      if(count($rands)>1){
        echo "<div class=\"randomizer-suggestions\"><h2 style=\"text-align:center; text-decoration:underline\">Try out other randomizers from the 'Time' category !</h2>";
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
  <script src="js files\collapsible.js"></script>
  <script src="js files\clock-time.js"></script>
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
