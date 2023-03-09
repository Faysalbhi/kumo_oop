
<?php

require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="categories";
$condition=[
  'where'=>['id'=>$_POST['category_id']],
];
$DB->destroy($table,$condition);

?>