<?PHP

include "../../entities/promotion.php";
include "../../core/promotionC.php";
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
    $promotionC = new PromotionC();

    if (isset($_POST['id_promotion'])) {
        echo "la vie est belle";
        $promotion=$promotionC->recupererPromotion($_POST['id_promotion']);
        foreach ($promotion as $row) {

        }
            $promotionC->supprimerPromotion($_POST['id_promotion']);
            echo $_POST['id_promotion'];

        header('Location: espacepromotion.php');
    }

}
?>