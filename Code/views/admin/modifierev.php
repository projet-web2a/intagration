<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 31/03/2019
 * Time: 20:11
 */
include "../../entities/evenement.php";
include "../../core/evenementC.php";
$evenementC = new EvenementC();
if (isset($_POST['modifier'])){
    $evenement=new Evenement($_POST['id_ini'],$_POST['nom_evenement'],$_POST['datedebut'],$_POST['datefin'],$_POST['nbrparticipant'],$_POST['nbrvue'],$_POST['image'],$_POST['description']);
    $evenementC->modifierEvenement($evenement,$_POST['id_ini']);
    echo $_POST['id_ini'];
    header('Location: espacevenement.php');
}