<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 29/03/2019
 * Time: 00:46
 */
require '../../core/livreurC.php';
require '../../entities/livreur.php';
if(isset($_GET['id']))
{

$livreur = new livreurC();
  $nb=$livreur->getnbLivraison($_GET['id']);
foreach ($nb as $li) {$nombre=$li['nblivraison'];}
if ($nombre==0)
{


$livreur->supprimerLivreurVille($_GET['id']);
$livreur->supprimerLivreur($_GET['id']);
header('Location: afficherlivreur.php');

}
else

{
	/*echo '<script language="javascript">';
echo 'window.alert("Ce livreur possde encore des livraison")';
echo '</script>'; */
header('Location: afficherlivreur.php?sup=1');


}

}


