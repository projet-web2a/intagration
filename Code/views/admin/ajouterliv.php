<?php

/**
 * Created by PhpStorm.
 * User: Nour
 * Date: 31/03/2019
 * Time: 22:40
 */
include "../../core/livreurC.php";
include "../../entities/livreur.php";

if (isset($_POST['nom']))
{


$livreur = new livreur(0,$_POST['prenom'],$_POST['nom'],$_POST['mail'],$_POST['tel'],$_POST['cin']);
$l = new livreurC();
$l->ajouterLivreur($livreur);
echo "ahouteeeeeeeeeeeeee";
//header('Location: afficherlivreur.php');

}
else
	 echo "nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn";
?>