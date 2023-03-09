<?php
session_start();
require_once "../inc/partial/config.php";
$flag=false;
if(empty($_POST['email'])){
  $flag=true;
  $_SESSION['email_error']='Provide a Email Address😃';
}
if(empty($_POST['password'])){
  $flag=true;
  $_SESSION['pass_serror']='Provide Your Password😃';

}
if($flag){
  header("location: $hostName"."admin");

}else{
  if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $sql=$conn->prepare("SELECT * FROM users WHERE email='{$email}'");
  $sql->execute();

 $result=$sql->fetch(PDO::FETCH_ASSOC);

 if($result > 0){
  if(password_verify($password,$result['password'])){
  $_SESSION['id']=$result['id'];
  $_SESSION['username']=$users['uname'];
  $_SESSION['email']=$result['email'];
  $_SESSION['user_role']=$result['user_role'];
  header("location:$hostName"."admin/dashboard.php");
  }else{
  $_SESSION['pass_serror']='invalid Password😃';
  header("location: $hostName"."admin");
    }
 }else{
  $_SESSION['email_error']='invalid Email Address😃';
  header("location: $hostName"."admin");
 }
}else{
  $block_ip=($_SERVER['REMOTE_ADDR']);
  header("location:ip_block.php?ip=".$block_ip);

}
}





?>