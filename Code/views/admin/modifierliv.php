<?php

include "../../core/livreurC.php";
include "../../entities/livreur.php";
if(isset($_GET['id']))
{
$li= new livreurC();

$livreur= new livreur($_POST['nblivraison'],$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['num_tel'],$_POST['cin']);
//var_dump($livraison);
$li->modifierLivreur($livreur,$_GET['id']);
header('Location: afficherlivreur.php');
}
?> 