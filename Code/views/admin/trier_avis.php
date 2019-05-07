<?php
require '../../core/avisC.php';
$ec= new avisC();
$ec->trier_avis();
header('Location: serviceapresvente.php');  
?>