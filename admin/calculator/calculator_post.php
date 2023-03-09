<?php

require_once "../../vendor/autoload.php";
use pondit\calculator\Calculator;

$num1=$_POST['number1'];
$num2=$_POST['number2'];

$calObj= new Calculator($num1,$num2);

if($_POST['cal']=="+"){
  
  $result= $calObj->sum(); 
  
}elseif($_POST['cal']=="-"){
  
  $result= $calObj->sub(); 
  
}elseif($_POST['cal']=="*"){
    $result= $calObj->multi(); 
  }
  elseif($_POST['cal']=="/"){
    
    $result= $calObj->div(); 
  }
 echo $result;
 

?>
