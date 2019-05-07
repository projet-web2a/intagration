<?php

require '../../core/commandeC.php';

$id=$_GET['id'];
$cc=new commandeC();
$cc->SupprimerCommande($id);
header('Location: listedescommandes.php');  
?>