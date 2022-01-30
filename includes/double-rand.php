<?php include_once 'dbrandomizer.php';
$path = $_SERVER['HTTP_REFERER'];
$path = str_replace("http://192.168.1.47/randomeverything/", "", $path);
  strpos($path, "&") ? $path = substr($path, 0, strpos($path, "&")) : $path;
  echo $path."<br>";
  echo $name_of_class;
  $class_selected = $_POST['class-select'];

  header('Location:../'.$path."&category=".$class_selected);
