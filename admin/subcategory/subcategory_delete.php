<?php
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="sub_categories";
$condition=[
  'where'=>['id'=>$_POST['subcategory_id']],
];
$DB->destroy($table,$condition);


?>