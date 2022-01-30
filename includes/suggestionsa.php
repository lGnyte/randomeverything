<?php
  include_once 'dbh.php';
  $suggestion = mysqli_real_escape_string($conn, $_POST['suggestion']);
  $date = date('Y-m-d H:i:s');
  $sql = "INSERT INTO suggestionsanonymous (suggestion, date) VALUES('$suggestion', '$date');";
  mysqli_query($conn, $sql);



  $message = "Thank You !";
  echo "<script type='text/javascript'>alert('$message')</script>";
  header("location:javascript://history.go(-1)");
