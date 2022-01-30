<?php
  include_once 'dbh.php';
  if (isset($_POST['submit'])){
    $rand_name = $_POST['rand-name'];
    $message = $_POST['feedback'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO rand_feedback (rand_name, message, date) VALUES('$rand_name', '$message', '$date');";
    mysqli_query($conn, $sql);

    header("location:javascript://history.go(-1)");
}
