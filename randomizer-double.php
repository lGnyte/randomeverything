<?php include 'includes/dbrandomizer.php';
$dbtable = mysqli_query($conn, "SELECT dbtable FROM double_randomizer WHERE id='".$_GET['id']."';")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php  if(isset($_GET['id'])) { $sqlTitle= mysqli_query($conn, "SELECT title FROM double_randomizer WHERE id='".$_GET['id']."';"); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title'];}}?></title>
  <meta charset="UTF-8">
  <link href="styles.css" rel="stylesheet">
  <link rel="icon" href="LogoRE1.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>
  <script>
    function loadlink(){
      var main = document.getElementById("main");
      $('#main').load(document.URL + ' #main');
    };
  </script>
  <style>
    #main{
      width:80%;
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
    <h1 style="font-size:35px; text-decoration:underline; color:#fd4503"><?php $sqlTitle= mysqli_query($conn, "SELECT title FROM double_randomizer WHERE id='".$_GET['id']."';"); while ($row = $sqlTitle->fetch_assoc()) { echo $row['title']."<br>";}?></h1>
    <?php
    include 'includes/dbscriptloc.php';
    $classes = array(); $n=1;
    $classes[1]= mysqli_query($conn, "SELECT class FROM ".$dbtable['dbtable']." WHERE nrcrt='".$_GET['id']."';")->fetch_assoc();
    $totalValues = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ".$dbtable['dbtable']));
    for ($aux=2; $aux<=$totalValues; $aux++) {
      $value = mysqli_query($conn, "SELECT class FROM ".$dbtable['dbtable']." WHERE nrcrt='".$aux."';")->fetch_assoc();
      $b=1;
      while ($b<=$n AND $classes[$b]['class'] !== $value['class']) $b++;
      if ($b>$n) $classes[++$n]['class']=$value['class'];
    }
    ?>
    <?php include 'includes/dbrandomizer.php';
    $after_otherexpl = mysqli_query($conn, "SELECT after_otherexpl FROM double_randomizer WHERE id='".$_GET['id']."';")->fetch_assoc();
    $before_otherexpl = mysqli_query($conn, "SELECT before_otherexpl FROM double_randomizer WHERE id='".$_GET['id']."';")->fetch_assoc();
    echo $before_otherexpl['before_otherexpl'];
    $keyword = mysqli_query($conn, "SELECT class_name FROM double_randomizer WHERE id='".$_GET['id']."';")->fetch_assoc();
    ?>
    <h2 style="margin: 20px 0 10px 10px">Choose the <?php echo $keyword['class_name'];?>:</h2>
    <form id="class-form" action="includes\double-rand.php" method="post" name="classForm">
      <select form="class-form" id="sel" name="class-select" onchange="classForm.submit()">
        <option disabled selected value> -- Select an Option -- </option>
        <?php
          $class_nr = mysqli_query($conn, "SELECT class_nr FROM double_randomizer WHERE id='".$_GET['id']."';");$row = $class_nr->fetch_assoc();
          for($x=1; $x<=$row['class_nr']; $x++){
            echo "<option value='".$classes[$x]['class']."'>".$classes[$x]['class']."</option>";
          }
        ?>
      </select>
    </form>
    <?php  $h2_1 = mysqli_query($conn, "SELECT h2_1 FROM double_randomizer WHERE id='".$_GET['id']."';")->fetch_assoc();
    include 'includes/dbscriptloc.php';
    if(isset($_GET['category'])) { echo " <h2 style=\"margin: 20px 0 10px 10px\">".$h2_1['h2_1'].$_GET['category']."</h2>";
      $itemNr = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ".$dbtable['dbtable']." WHERE class='".$_GET['category']."';"));
      $nrcrt=rand(1,$itemNr);
    } else {
      echo '<style type="text/css">
              #result {
                display:none;
              }
              #submit {
                display:none;
              }
            </style>';
    }
    ?>
    <div class="output-box" id="result" style="height:50px;">
      <p style="padding: 13px 5px;margin:0;"><?php $sql= mysqli_query($conn, "SELECT item FROM ".$dbtable['dbtable']." WHERE sub_nrcrt=".$GLOBALS['nrcrt']." AND class='".$_GET['category']."';"); while ($row = mysqli_fetch_assoc($sql)) echo $row['item']; ?></p>
    </div>
    <button id="submit" type="submit" name="submit" style="margin-left:15px; margin-top:20px" onclick="loadlink()">Generate</button>
    <p>If you encounter any bugs, let us know ! <a href="randomizer-feedback.php" class="issues-link">Contact us here !</a></p>
    <div style="margin-top:50px;"><?php echo $after_otherexpl['after_otherexpl'];?></div>
    <?php
      include 'includes/dbrandomizer.php';
      $rands[0] = ""; $aux=0;
      $sqlTitle= mysqli_query($conn, "SELECT title FROM double_randomizer WHERE id='".$_GET['id']."';")->fetch_assoc()['title'];
      $category = mysqli_query($conn, "SELECT category FROM randomizers_all WHERE title_name='".$sqlTitle."';")->fetch_assoc()['category'];
      $ceva = mysqli_query($conn, "SELECT nrcrt FROM randomizers_all WHERE category='".$category."'"); while($row = $ceva->fetch_assoc()){$rands[$aux++]=$row['nrcrt'];}
      if(count($rands)>1){
        echo "<div class=\"randomizer-suggestions\"><h2 style=\"text-align:center; text-decoration:underline\">Try out other randomizers from the 'Popular' category !</h2>";
        for($x=0; $x<$aux; $x++){
          $title = mysqli_query($conn, "SELECT title_name FROM randomizers_all WHERE nrcrt=".$rands[$x])->fetch_assoc()['title_name'];
          $path = mysqli_query($conn, "SELECT path FROM randomizers_all WHERE nrcrt=".$rands[$x])->fetch_assoc()['path'];
          if ($title !== $sqlTitle) echo "<a href=\"".$path."\">".$title."</a><br>";
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
  <script>
    function openSideMenu(){
      document.getElementById('side-menu').style.width='350px';
    }
    function closeSideMenu (){
      document.getElementById('side-menu').style.width='0px';
    }
    // $(document).ready(function () {
    //   document.getElementById("result").innerHTML = "";
    // });
    $('#main').load(document.URL + ' #main');
    $(document).keyup(function(event) {
      if (event.keyCode === 13) {
        $("#submit").click();
      }
    });
    $('#class-form').submit(function () {
      $.ajax({
        url: $(this).attr('/includes/double-rand.php'),
        type: $(this).attr('post')
      })
    });
  </script>
</body>
</html>
