<?php
session_start();
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="products";
$data=[
    'name'=>$_POST['name'],
    'category_name'=>$_POST['category_id'],
    'sub_category_name'=>$_POST['subcategory_id'],
    'price'=>$_POST['price'],
    'description'=>$_POST['description']

];
// insert without image 
$id=$DB->insert($table,$data);
// check input image is empty or not 
if(!empty($_FILES['image']['name'])){

    // make file name 
    $file=$_FILES['image']['name'];
    $explode=explode('.',$file);
    $ext=end($explode);
    $imgname=$id.".".$ext;
    if(($_FILES['image']['size'])<=1000000){
        $newlocation="../uploads/product/".$imgname;
        $data['img']=$imgname;
        move_uploaded_file($_FILES['image']['tmp_name'],$newlocation);
        // now update data with image 
        $condition=['where'=>['id'=>$id]];
        $DB->update($table,$data,$condition);
        $_SESSION['add']="successfully updated";
        header("location:all_product.php");

    }else{
        echo "File ize Too long";
    }


}else{
    $_SESSION['add']="successfully created";
    header("location:all_product.php");
}



?>