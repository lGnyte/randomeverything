<?php

$randomizers_db=      mysqli_connect('localhost', 'root', '', true) or die(mysqli_error());
$script_locales_db=   mysqli_connect('localhost', 'root', '', true) or die(mysqli_error());

mysqli_select_db('randomizers', $randomizers_db) or die(mysqli_error());
mysqli_select_db('script_locales', $script_locales_db) or die(mysqli_error());
