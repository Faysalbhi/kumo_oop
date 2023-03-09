<?php 
session_start();


session_destroy();
header("location: /pondit/admin/index.php");


?>