<?PHP
include "../../entities/evenement.php";
include "../../core/evenementC.php";


global $db;
$evenement1C=new EvenementC();
$listeEvenement=$evenement1C->afficherEvenement();

//var_dump($listeEmployes->fetchAll());
foreach($listeEvenement as $row) {
    $id_evenement = $row['id_evenement'];
    $nom_evenement = $row['nom_evenement'];
    $datedebut = $row['datedebut'];
    $datefin = $row['datefin'];
    $nbrparticipant = $row['nbrparticipant'];
    $nbrvue = $row['nbrvue'];
    $image = $row['image'];
    $description = $row['description'];
    $evenementC = new EvenementC();

    $evenement = new Evenement($id_evenement, $nom_evenement, $datedebut, $datefin, $nbrparticipant, $nbrvue, $image, $description);
    $evenementC->modifierEvenementvue($evenement, $id_evenement);

}
header('Location:  afficherevenement1.php');
?>