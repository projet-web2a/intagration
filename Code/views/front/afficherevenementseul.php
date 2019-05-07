<?PHP
session_start();
include "../../core/participationC.php";

if (empty($_SESSION['username']))
{

    header('Location: index1.php');

    /*  echo 'Votre login est <b>'.$_SESSION['l'].'</b> <br>et votre mot de passe est <b>'.$_SESSION['p'].
          '</b><br>Votre role est : '.$_SESSION['r'].' <br/> Identifiant de la session est :'.session_id().'</br>';
      echo '<a href="./logout.php">Cliquer pour se déconnecter</a>';
  */
}
else {


    $participationC = new ParticipationC();
    $result = $participationC->recupererParticipation($_POST['id_evenement'], $_SESSION['user']);

    var_dump($result);
    if ($result == false)
        header('Location: afficherparticipationajouter.php?id=' . $_POST['id_evenement']);
    else
        header('Location: afficherparticipationsupprimer.php?id=' . $_POST['id_evenement']);
//if (empty($result))
}
?>