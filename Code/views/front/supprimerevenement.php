<?PHP
include "../entite/evenement.php";
include "../core/evenementC.php";
$evenementC=new EvenementC();

if (isset($_POST['id_evenement'])){
    echo "la vie est belle";
    $evenementC->supprimerEvenement($_POST['id_evenement']);
    header('Location: afficherevenement.php');

}


?>