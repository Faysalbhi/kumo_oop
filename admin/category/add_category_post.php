<?php
session_start();
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="categories";
$data=[
    'name'=>$_POST['name'],
    'description'=>$_POST['description']
];

$DB->insert($table,$data);

$_SESSION['add']="successfully created";
header("location:all_category.php");
?>