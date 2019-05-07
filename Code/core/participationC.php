<?PHP
include_once "evenementC.php";
include_once "promotionC.php";

class ParticipationC
{


    function ajouterParticipation($participation)
    {



        $db = config::getConnexion();
        $sql = "INSERT INTO participation (id_participation,id_evenement,username) VALUES(:id_participation,:id_evenement,:username)";

        try {
            $req = $db->prepare($sql);

            $id_participation = $participation->getIdpart();
            $id_evenement = $participation->getIdevent();
            $username = $participation->getUser();
            $req->bindValue(':id_participation', $id_participation);
            $req->bindValue(':id_evenement', $id_evenement);
            $req->bindValue(':username', $username);


            $req->execute();
            // header('Location: ../espacemarketing.php');

        } catch (Exception $e) {

            // header('Location: ../register.php');
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function supprimerParticipation($id, $ide)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM participation where id_evenement=:id_evenement AND username=:username";

        $req = $db->prepare($sql);

        $req->bindValue(':id_evenement', $id);
        $req->bindValue(':username', $ide);

        try {
            $req->execute();
            // header('Location: index.php');

        } catch (Exception $e) {

            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierEvenement($evenement, $id)
    {
        $db = config::getConnexion();
        $sql = "UPDATE evenement SET  nom_evenement=:nom_evenement,datedebut=:datedebut, datefin=:datefin,nbrparticipant=:nbrparticipant,nbrvue=:nbrvue , image=:image , description=:description where id_evenement=:id_evenement";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try {
            $req = $db->prepare($sql);

            $nom_evenement = $evenement->getNom();
            $datedebut = $evenement->getDatedebut();
            $datefin = $evenement->getDatefin();
            $nbrvue = $evenement->getNbrvue();
            $nbrparticipant = $evenement->getNbrparticipant();
            $image = $evenement->getImage();
            $description = $evenement->getDescription();
            $datas = array(':nom_evenement' => $nom_evenement, ':datedebut' => $datedebut, ':datefin' => $datefin, ':nbrparticipant' => $nbrparticipant, ':nbrvue' => $nbrvue, ':image' => $image, ':description' => $description);
            $req->bindValue(':id_evenement', $id);
            $req->bindValue(':nom_evenement', $nom_evenement);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':nbrparticipant', $nbrparticipant);
            $req->bindValue(':nbrvue', $nbrvue);
            $req->bindValue(':image', $image);
            $req->bindValue(':description', $description);

            $s = $req->execute();

            // header('Location: index.php');
        } catch (Exception $e) {
            echo " Erreur ! " . $e->getMessage();
            echo " Les datas : ";
            print_r($datas);
        }

    }

    function recupererParticipation($ide,$id){
        $db = config::getConnexion();
        $sql="SELECT * from participation JOIN client ON participation.username=client.username where id_evenement=$ide" ;
        //$req->bindValue(':id_evenement',$id);


        try{


            $liste=$db->query($sql);
            $liste->execute();
            $hene=$liste->fetch();

            return $hene;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>