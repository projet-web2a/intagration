<?php
require "../../entities/rdv.php";
require "../../core/rdvC.php";
$id=$_GET["idR"];
$ec= new RdvC();
$ec->SupprimerRdv($id);
echo '<meta http-equiv="refresh" content="0; URL=displayRdv.php" />';
//header('Location: ../front/dispalyRdvFront.php');
?>