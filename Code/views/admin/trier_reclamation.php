<?php
require '../../core/reclamationC.php';
$ec= new reclamationC();
$ec->trier_reclamation();
header('Location: serviceapresvente.php');  
?>