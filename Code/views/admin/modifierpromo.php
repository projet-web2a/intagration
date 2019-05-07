<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 31/03/2019
 * Time: 20:11
 */
include "../../entities/promotion.php";
include "../../core/promotionC.php";
$promotionC = new PromotionC();

if (isset($_POST['modifier'])) {
    $promotion = new Promotion($_POST['id_ini'], $_POST['datedebut'], $_POST['datefin'], $_POST['idProduit'], $_POST['categorie'], $_POST['taux'], 0,0);
    $promotionC = new PromotionC();


    $ancienprix=$promotionC->calculerPrix($_POST['idProduit']);
    var_dump($ancienprix);
//$val=floatval($ancienprix);
//$resultat= array(':ancienprix'=>$ancienprix);
//echo $resultat[':ancienprix'];
    $nouvprix=($ancienprix['prix']*($_POST['taux']))/100;
//echo $val;

    $promotion1=new Promotion(0,$_POST['datedebut'],$_POST['datefin'],$_POST['idProduit'],$_POST['categorie'],$_POST['taux'], $nouvprix,0);

    $promotionC->modifierPromotion($promotion1,$_POST['id_ini']);

    header('Location: espacepromotion.php');}

?>

