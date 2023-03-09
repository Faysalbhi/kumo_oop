<?php
session_start();
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="sub_categories";
$data=[
    'name'=>$_POST['name'],
    'category_id'=>$_POST['category_id'],
    'description'=>$_POST['description']
];
$DB->insert($table,$data);
$_SESSION['add']="successfully created";
header("location:all_subcategory.php");
?>