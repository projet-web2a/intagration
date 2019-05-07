<?PHP
require_once 'config.php';
class PromotionC
{
    function afficherPromotion()
    {
        $sql = "SElECT * From promotion where lu=0";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
	  function marquertoutlu()
    {
        $sql = "UPDATE  promotion SET lu=1";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recuperenouvPromotion()
    {$time=time();
        $sql = "SElECT * From promotion where lu=0 and datefin<$time";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }
	
    function ajouterPromotion($promotion)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO promotion(id_promotion,datedebut,datefin,idProduit,categorie,taux,prixfinal,lu) VALUES(:id_promotion,:datedebut,:datefin,:idProduit,:categorie,:taux,:prixfinal,:lu)";

        try {
            $req = $db->prepare($sql);
            $lu = $promotion->getlu();
            $id_promotion = $promotion->getId();
            $datedebut = $promotion->getDatedebut();
            $datefin = $promotion->getDatefin();
            $idProduit = $promotion->getRefe();
            $categorie = $promotion->getCategorie();
            $taux = $promotion->getTaux();
            $prixfinal = $promotion->getPrix();

            $req->bindValue(':id_promotion', $id_promotion);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':idProduit', $idProduit);
            $req->bindValue(':categorie', $categorie);
            $req->bindValue(':taux', $taux);
            $req->bindValue(':prixfinal', $prixfinal);
            $req->bindValue(':lu', $lu);



            $req->execute();
            // header('Location: ../espacemarketing.php');

        } catch (Exception $e) {

            // header('Location: ../register.php');
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }


    function supprimerPromotion($id)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM promotion where id_promotion= :id_promotion";

        $req = $db->prepare($sql);
        $req->bindValue(':id_promotion', $id);
        try {
            $req->execute();
            // header('Location: index.php');
        } catch (Exception $e) {

            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierPromotion($promotion, $id)
    {
        $db = config::getConnexion();
        $sql = "UPDATE promotion SET datedebut=:datedebut, datefin=:datefin,idProduit=:idProduit,categorie=:categorie,taux=:taux,prixfinal=:prixfinal where id_promotion=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try {
            $req = $db->prepare($sql);

            // $id_promotion = $promotion->getId();
            $datedebut = $promotion->getDatedebut();
            $datefin = $promotion->getDatefin();
            $idProduit = $promotion->getRefe();
            $categorie = $promotion->getCategorie();
            $taux = $promotion->getTaux();
            $prixfinal = $promotion->getPrix();

            $datas = array(':datedebut' => $datedebut, ':datefin' => $datefin, ':idProduit' => $idProduit, ':categorie' => $categorie, ':taux' => $taux, ':prixfinal' => $prixfinal);
            //   $req->bindValue(':id_promotion', $id_promotion);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':idProduit', $idProduit);
            $req->bindValue(':categorie', $categorie);
            $req->bindValue(':taux', $taux);
            $req->bindValue(':prixfinal', $prixfinal);


            $s = $req->execute();

            // header('Location: index.php');
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : ";
            print_r($datas);
        }

    }
    function recupererProduit($id){
        $db = config::getConnexion();
        

        $sql="SELECT * from produit where refe=$id";
       


        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recupererPromotion($id)
    {
        $db = config::getConnexion();

        $sql = "SELECT * from promotion where id_promotion=$id";


        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercherListepromotion($par)
    {
        $db = config::getConnexion();
        $sql = "SELECT * from promotion where taux=$par";
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function calculerPrix($id)
    {
        $db = config::getConnexion();
        $sql = "SELECT prix from produit where refe=$id";

        try {
            $ancienprix = $db->query($sql);
            //  echo"nnn";
            $ancienprix->execute();
            $ancienprix1 = $ancienprix->fetch();
            return $ancienprix1;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }


    }

    function recupererUrl($id)
    {
        $db = config::getConnexion();
        $sql = "SELECT url from produit where refe=$id";

        try {
            $ancienprix = $db->query($sql);
            echo "nnn";
            $ancienprix->execute();
            $ancienprix1 = $ancienprix->fetch();
            return $ancienprix1;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererdesc($id)
    {
        $db = config::getConnexion();
        $sql = "SELECT descr from produit where refe=$id";

        try {
            $ancienprix = $db->query($sql);
            echo "nnn";
            $ancienprix->execute();
            $ancienprix1 = $ancienprix->fetch();
            return $ancienprix1;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }

    }

    public function trier($par)
    {
        $db = config::getConnexion();

        $sql = "SELECT * FROM promotion order by $par ";

        try {
            echo ' gg';
            $result = $db->query($sql);

            return $result;

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function afficherProduit1()
    {
        $sql = "SElECT  *  From produit where produit.refe not in (SELECT idProduit from promotion where lu=0) ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);

            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function afficherProduit()
    {
        $sql = "SElECT  *  From produit where produit.refe not in (SELECT idProduit from promotion) ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);

            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function Ajouternotifcation($refe, $url, $prixfinal, $prix, $lu)
    {
        $database = config::GetConnexion();
        $req = $database->prepare("INSERT INTO notificationpromo(idNot,refe,url,prixfinal,prix,lu) Values(0,:refe,:url,:prixfinal,:prix,0)");

        $req->bindValue(':refe', $refe);
        $req->bindValue(':url', $url);
        $req->bindValue(':prixfinal', $prixfinal);
        $req->bindValue(':prix', $prix);
        $req->bindValue(':lu', $lu);


        $req->execute();
    }
    function Marquerpromononlu()
    {
        $database=config::GetConnexion();
        $sql="UPDATE promotion SET lu=0 where lu=1 ";

        $q = $database->prepare($sql);
        $q->execute();


    }

    function MarquerCommelu($id)
    {
        $database = config::GetConnexion();
        $sql = "UPDATE promotion SET lu=1 where id_promotion=$id";

        $q = $database->prepare($sql);
        $q->execute();
    }

    function Modifierproduit($id, $taux)
    {
        $db = config::getConnexion();
        $sql = "UPDATE produit set promo=$taux where refe=$id";

        try {
            $req = $db->prepare($sql);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    
    function Nombrepart()
    {
        $db = config::getConnexion();
        $sql = "select * from participation";

        try {
            $req = $db->prepare($sql);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
function afficherevenement()
{
    $sql = "SElECT * From evenement";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }

}
function recuperermailclient()
{
    $sql = "SElECT email From client";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
}
?>