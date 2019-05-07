<?php
require '../../core/classpanier.php';

$refe=$_GET['refe'];
supprimerArticle($refe);
header('Location: panier.php');  
?>