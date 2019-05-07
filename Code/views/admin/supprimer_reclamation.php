<?php
require '../../core/reclamationC.php';


$id=$_GET['id'];
$ec= new reclamationC();
$ec->SupprimerReclamation($id);
header('Location: serviceapresvente.php');  
?>