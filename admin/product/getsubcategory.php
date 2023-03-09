<?php
$dbname="mysql:host=localhost;dbname=pondit";
$username="root";
$password='';
$conn=new PDO($dbname,$username,$password);
$id=$_POST['category_id'];

$sql=$conn->prepare("SELECT * FROM sub_categories WHERE category_id=$id");
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);

$str='<option selected disabled>Select Category</option>';
foreach($result as $value){
    $str.='<option value="'.$value["id"].'">'.$value["name"].'</option>';
}
echo $str;

?>