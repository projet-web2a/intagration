<?PHP
include "../../entities/evenement.php";
include "../../core/evenementC.php";

$evenement1=new Evenement(0,$_POST['Nom'],$_POST['Datedebut'],$_POST['Datefin'],0,0,$_POST['Image'], $_POST['Description']);

$evenement1C=new EvenementC();

$evenement1C->ajouterEvenement($evenement1);
header('Location: espacevenement.php');

?>

