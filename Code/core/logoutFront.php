<?php 
session_start();
session_destroy();

header("location:../views/front/index1.php"); 

?>