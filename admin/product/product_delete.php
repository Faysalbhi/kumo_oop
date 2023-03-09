
<?php
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="products";
$condition=[
  'where'=>['id'=>$_POST['product_id']],
];
$DB->destroy($table,$condition);


?>