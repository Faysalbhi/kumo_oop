<?php
session_start();
require_once "../inc/partial/config.php";
$checkpassword="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/";
$flag=false;
if(empty($_POST['fname'])){
    $flag=true;
    $_SESSION['fname_null']="Please Provide User First Name";
}
if(empty($_POST['lname'])){
    $flag=true;
    $_SESSION['lname_null']="Please Provide Users Laset Name";
}
if(empty($_POST['lname'])){
    $flag=true;
    $_SESSION['uname_null']="Please Provide Users Name";
}
if(empty($_POST['email'])){
    $flag=true;
    $_SESSION['email_null']="Please Provide a Email Address";
}
if(empty($_POST['user_role'])){
    $flag=true;
    $_SESSION['user_role_null']="Please Select a Ueser Role";
}
if(empty($_POST['password'])){
    $flag=true;
    $_SESSION['pass_null']="Please Enter your  Password";
}elseif(!preg_match($checkpassword,$_POST['password'])){
    $flag=true;
    $_SESSION['pass_null']="Please Provide a Strong Password in 4 characters";
}


if($flag){
  $_SESSION['fname']=$_POST['fname'];
  $_SESSION['lname']=$_POST['lname'];
  $_SESSION['uname']=$_POST['uname'];
  $_SESSION['email']=$_POST['email'];
  $_SESSION['password']=$_POST['password'];
  $_SESSION['user_role']=$_POST['user_role'];
  header("location: add_user.php");
}else{
      
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $uname=$_POST['uname'];
      $email=$_POST['email'];
      $user_role=$_POST['user_role'];
        
      $password1=$_POST['password'];
      $sql=$conn->prepare("SELECT * FROM users WHERE email='$email'");
      $sql->execute();
      $result=$sql->fetchAll();
      echo count($result);

      if(count($result)){
           $_SESSION['email_exist']="This Email All Rready Exist";
          header("location: add_user.php");
      }else{
      $password= password_hash($password1,PASSWORD_DEFAULT);
      $sql=$conn->prepare("INSERT INTO users(fname,lname,uname,email,user_role,password)
       VALUES('$fname','$lname','$uname','$email',$user_role,'$password')");
       $sql->execute();

      header("location: all_user.php");
      $conn=null;
      }

}







?>