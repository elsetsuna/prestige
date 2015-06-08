<?php
  error_reporting(0);

if (empty($_SESSION[user_name])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
include "head.php";
include "home.php";
}
include "foot.php";
?>