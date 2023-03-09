<?php
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="users";
$condition=[
  'where'=>['id'=>$_POST['user_id']],
];
$DB->destroy2($table,$condition);

?>