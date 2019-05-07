<?PHP

include "../../entities/evenement.php";
include "../../core/evenementC.php";
session_start();

if (empty($_SESSION['id']) )
{

    header('Location: login.php');

    /*  echo 'Votre login est <b>'.$_SESSION['l'].'</b> <br>et votre mot de passe est <b>'.$_SESSION['p'].
        '</b><br>Votre role est : '.$_SESSION['r'].' <br/> Identifiant de la session est :'.session_id().'</br>';
    echo '<a href="./logout.php">Cliquer pour se déconnecter</a>';
    */
}
else {
    $evenementC = new EvenementC();

    if (isset($_POST['id_evenement'])) {
        echo "la vie est belle";
        // $participationC->supprimerParticipation($_POST['id_evenement'],$_SESSION['user']);
        $evenementC->supprimerEvenement($_POST['id_evenement']);
        header('Location: espacevenement.php');


    }
}

?>