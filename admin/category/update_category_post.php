<?php
session_start();

$name=$_POST['name'];
$description=$_POST['description'];
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB= new DB;
$table='categories';
$data=[
    'name'=>$_POST['name'],
    'description'=>$_POST['description']

];
$condition=['where'=>['id'=>$_POST['id']]];
$DB->update($table,$data,$condition);

$_SESSION['add']="successfully Updated";
header("location:all_category.php");
?>