<?php
session_start();
require_once "../dashboard_parts/config.php";

// check file is set or not 
if(isset($_FILES['fileImg'])){

//get file name and extention
$file_name=explode('.',$_FILES['fileImg']['name']);
$file_ext= end($file_name);
$except_ext=['png','jpeg','jpg'];
$file_ext= end($file_name);
if(in_array($file_ext,$except_ext)){
 
//  check file size and process for upload 
 if($_FILES['fileImg']['size']<= 1000000){

    // define all necessary variable 
    $id=$_POST['id'];
    $uname=$_POST['name'];
    $old_image=$_POST['old_image'];
    $email=$_POST['email'];
    $password=$_POST['new_pass'];
    $password_hash= password_hash($password,PASSWORD_DEFAULT);

    // set file name and uploded location 
    $ufile_name=$id.'.'.$file_ext;
    if($old_image!=="default.png"){
    unlink("../dashboard_assets/images/profile/".$old_image);
    }
    $uploaded_location="../dashboard_assets/images/profile/".$ufile_name;
    move_uploaded_file($_FILES['fileImg']['tmp_name'],$uploaded_location);

    // profle update query 


    $update="UPDATE users SET uname='$uname', email='$email', password='$password_hash',profile_pic='$ufile_name' WHERE id=$id";
    mysqli_query($db_connect,$update);
    header("location:$hostName"."admin/dashboard.php");//upload complite and go to  dashboard.php file
 
 }else{
  $_SESSION['size_error']='File size too large';
  header("location:$hostName"."admin/invoice/profile.php");
 
 }

}else{
  $_SESSION['ext_errot']='File Format Unvalid';
  header("location:$hostName"."admin/invoice/profile.php");
 
 }


}


?>