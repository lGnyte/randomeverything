<?php include_once 'includes/dbrandomizer.php';?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Random Dates</title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <style>
  input[type=text]{
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
      <li><a href="index.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="about-us.php">About Us</a></li>
    </ul>
  </nav>
  <div id="main" style="line-height:30px">
    <h1 style="color:#fd4503; text-decoration:underline">Random Dates</h1>
    <h2>&nbsp;&nbsp;Randomizer settings:</h2>
    <div id="criterias">
      <label for="number-of-values">Number of generates:</label>
      <input type="number" name="number-of-values" style="padding: 3px 6px;font-size: 15px;float:right;width:50px;" id="number-of-values" value="1"><br>
      <label for="hour-format">Date format: </label>
      <select class="select" name="date-format" id="d-format" style="float:right">
        <option value="1" selected>mm/dd/yyyy</option>
        <option value="2">dd/mm/yyyy</option>
        <option value="3">yyyy/mm/dd</option>
        <option value="4">yyyy/dd/mm</option>
        <option value="5">dd/mm</option>
        <option value="6">mm/dd</option>
        <option value="7">mm/yyyy</option>
        <option value="8">yyyy/mm</option>
      </select><br>
    </div>
    <button type="submit" name="see-more" onclick=advanced() id="seemore-btn" style="float:none; color:#4c8df5; font-size:20px">More options &#9662;</button>
    <div id="advanced" style="height: 0px;">
      <button type="submit" name="submit" style="margin:5px;" onclick="resetMoreOptions()">Reset "More options"</button>
      <button type="submit" name="submit" style="margin:5px;" onclick="resetAll()">Reset all settings</button><br> *Any empty box will count as the default value*<br>
      <label style="text-decoration:underline; font-size:18px">Set intervals:</label><br>
      <div class="interval-box">
        Year (0-2099)<br>
        <label for="interval-year-min">Min:</label>
        <input type="number" name="interval-year-min" value="" style="width:35px" min="0" max="2099" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4">
        <label for="interval-hour-max">Max:</label>
        <input type="number" name="interval-year-max" value="" style="width:35px" min="0" max="2099" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4">
      </div>
      <div class="interval-box">
        Month (1-12)<br>
        <label for="interval-month-min">Min:</label>
        <input type="number" name="interval-month-min" value="" style="width:35px" min="1" max="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
        <label for="interval-month-max">Max:</label>
        <input type="number" name="interval-month-max" value="" style="width:35px" min="1" max="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
      </div>
      <div class="interval-box">
        Day (1-31)<br>
        <label for="interval-day-min">Min:</label>
        <input type="number" name="interval-day-min" value="" style="width:35px" min="1" max="31" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
        <label for="interval-day-max">Max:</label>
        <input type="number" name="interval-day-max" value="" style="width:35px" min="1" max="31" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">
      </div><br><br>
      <label style="text-decoration:underline; font-size:18px">Preset values (intervals won't count if a value is preset):</label><br>&nbsp;
      <label for="">Year (0-2099):</label>
      <input type="number" name="preset-year" value="" style="width:35px;" min="0" max="2099" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4">&nbsp;&nbsp;
      <label for="">Month (1-12):</label>
      <input type="number" name="preset-month" value="" style="width:35px;" min="1" max="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">&nbsp;&nbsp;
      <label for="">Day (1-31):</label>
      <input type="number" name="preset-day" value="" style="width:35px;" min="1" max="31" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "2">&nbsp;&nbsp;<br><br>
      <label style="text-decoration:underline; font-size:18px">Operators</label><br>&nbsp;
      <input type="checkbox" name="spacing" checked>
      <label for="spacing">Display each value on a separate line.</label><br>&nbsp;
      <input type="checkbox" name="0-at-result" checked>
      <label for="spacing">Add an extra '0' if the month/day is <10</label><br>
      <label for="operator-sel">Character between date elements: </label>
      <select class="select" name="operator-sel" id="operator-sel">
        <option value="/" selected>/</option>
        <option value=".">.</option>
        <option value="-">-</option>
      </select>
    </div>
    <h2>&nbsp;&nbsp;Your result:</h2>
    <textarea class="output-box" id="result" rows="10" cols="40" disabled style="resize:none;"></textarea><br>
    <button type="submit" name="submit" style="position:absolute; font-size: 10px; padding:0" onclick="copyText()">Copy to clipboard</button><br>
    <button type="submit" name="submit" id="submit" style="margin-left:15px;  margin-top: 5px;" onclick="generate()">Generate</button>
    <button type="submit" name="submit" style="margin-left:15px;  margin-top: 5px;" onclick='document.getElementById("result").innerHTML = "" '>Reset</button>
    <input type="checkbox" name="concat" checked>
    <label for="concat">Delete previous values on new generate</label>
    <p>If the output bugs out, the 'Reset' button should fix it. <a href="randomizer-feedback.php?rand-name=Random+Dates" class="issues-link">Having issues?</a></p>
    <p>&nbsp;&nbsp;<b>This program might have some issues when generating with a "February" preset. We are still working on the code and we will update to a stable version as soon as it is ready!</b></p>
    <p>&nbsp;&nbsp;Be careful! The result may generate slower, depending on the number of values you want to generate. If it takes too long, try re-opening the page and insert a smaller amount of values.</p>
    <?php
      $rands[0] = ""; $aux=0;
      $ceva = mysqli_query($conn, "SELECT nrcrt FROM randomizers_all WHERE category='Time'"); while($row = $ceva->fetch_assoc()){$rands[$aux++]=$row['nrcrt'];}
      if(count($rands)>1){
        echo "<div class=\"randomizer-suggestions\"><h2 style=\"text-align:center; text-decoration:underline\">Try out other randomizers from the 'Time' category !</h2>";
        for($x=0; $x<$aux; $x++){
          $title = mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rands[$x])->fetch_assoc()['title_name'];
          $path = mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rands[$x])->fetch_assoc()['path'];
          if ($title !== "Random Dates") echo "<a href=\"".$path."\">".$title."</a><br>";
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
  <script src="js files\dates.js"></script>
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
