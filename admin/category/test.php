<?php
require_once "../../vendor/autoload.php";
use pondit\DB;
$DB =new DB;
$table="category";
$condition=[
  'where'=>['id'=>2],
];
$DB->destroy($table,$condition);




?>