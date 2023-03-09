<?php
$dbname="mysql:host=localhost;dbname=pondit";
$username="root";
$password='';
$conn=new PDO($dbname,$username,$password);


function d($dvalue){
  echo "<pre>";
  var_dump($dvalue);
  echo "</pre>";

}function dd($dvalue){
  echo "<pre>";
  var_dump($dvalue);
  echo "</pre>";
  die("This function from: Config.php");

}


?>