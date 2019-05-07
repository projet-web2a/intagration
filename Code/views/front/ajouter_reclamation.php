<?php
require '../../entities/reclamation.php';
require '../../core/reclamationC.php';

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['refe']) and isset($_POST['message']))
{

$date = date("Y-m-d");
echo $date;
$reclam=new reclamation($_POST['nom'],$_POST['prenom'],$_POST['refe'],$_POST['message'],$date);

$reclam1=new reclamationC();
$reclam1->ajouter_reclamation($reclam);
//header('Location: afficherEmploye.php');
}else{
	echo "vérifier les champs";
}
?>