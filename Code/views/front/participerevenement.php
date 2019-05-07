<?PHP

include "../../entities/participation.php";
include "../../core/participationC.php";
include "../../entities/evenement.php";
session_start();
// On s'amuse à créer quelques variables de session dans $_SESSION


global $db;
if (isset($_POST['participer'])) {

    $evenementC = new EvenementC();
    echo ' la vie en rose';
    $result = $evenementC->recupererEvenement($_POST['id_evenement']);
foreach($result as $row) {

    $id_evenement = $row['id_evenement'];
    $nom_evenement = $row['nom_evenement'];
    $datedebut = $row['datedebut'];
    $datefin = $row['datefin'];
    $nbrparticipant = $row['nbrparticipant'];
    $nbrvue = $row['nbrvue'];
    $image = $row['image'];
    $description = $row['description'];
}
    $evenement=new Evenement($id_evenement,$nom_evenement,$datedebut,$datefin,$nbrparticipant,$nbrvue,$image,$description);
    $evenementC->modifierEvenement($evenement,$id_evenement);

}
$participation1=new Participation(0,$_POST['id_evenement'],$_SESSION['username']);

$participation1C=new ParticipationC();

$participation1C->ajouterParticipation($participation1);

header('Location:  afficherevenement1.php');
?>
