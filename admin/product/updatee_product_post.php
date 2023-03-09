<?php
session_start();
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB= new DB;
$data=[
    'name'=>$_POST['name'],
    'category_name'=>$_POST['category_id'],
    // 'sub_category_name'=>$_POST['subcategory_id'],
    'price'=>$_POST['price'],
    'description'=>$_POST['description'],

];
$condition=['where'=>['id'=>$_POST['id']]];
$DB->update('products',$data,$condition);

$_SESSION['add']="successfully Updated";
header("location:all_product.php");
?>