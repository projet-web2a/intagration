<?PHP
include_once "config.php";
class EvenementC
{
    function afficherEvenement()
    {        $db = config::getConnexion();

        $sql = "SElECT * From evenement";
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouterEvenement($evenement)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO evenement (id_evenement,nom_evenement,datedebut,datefin,nbrparticipant,nbrvue,image,description) VALUES(:id_evenement,:nom_evenement,:datedebut,:datefin,:nbrparticipant,:nbrvue,:image,:description)";

        try {
            $req = $db->prepare($sql);

            $nom_evenement = $evenement->getNom();
            $datedebut = $evenement->getDatedebut();
            $datefin = $evenement->getDatefin();
            $nbrparticipant = $evenement->getNbrparticipant();
            $nbrvue = $evenement->getNbrvue();
            $image = $evenement->getImage();
          //  $copy_destination=""
            $description = $evenement->getDes();
            $id_evenement = $evenement->getId();
            $req->bindValue(':id_evenement', $id_evenement);
            $req->bindValue(':nom_evenement', $nom_evenement);
            $req->bindValue(':datedebut', $datedebut);
            $req->bindValue(':datefin', $datefin);
            $req->bindValue(':nbrparticipant', $nbrparticipant);
            $req->bindValue(':nbrvue', $nbrvue);
            $req->bindValue(':image', $image);
            $req->bindValue(':description', $description);


            $req->execute();
            // header('Location: ../espacemarketing.php');

        } catch (Exception $e) {

            // header('Location: ../register.php');
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function supprimerEvenement($id)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM evenement where id_evenement= :id_evenement";

        $req = $db->prepare($sql);
        $req->bindValue(':id_evenement', $id);
        try {
            $req->execute();
            // header('Location: index.php');
        } catch (Exception $e) {

            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierEvenement($evenement,$id){
        $db = config::getConnexion();
        $sql="UPDATE evenement SET  nom_evenement=:nom_evenement,datedebut=:datedebut, datefin=:datefin,nbrparticipant=:nbrparticipant,nbrvue=:nbrvue , image=:image , description=:description where id_evenement=:id_evenement";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);

            $nom_evenement=$evenement->getNom();
            $datedebut=$evenement->getDatedebut();
            $datefin=$evenement->getDatefin();
            $nbrvue=$evenement->getNbrvue();
            $nbrparticipant=$evenement->getNbrparticipant();
            $image=$evenement->getImage();
            $description=$evenement->getDes();
            $datas = array(':nom_evenement'=>$nom_evenement, ':datedebut'=>$datedebut, ':datefin'=>$datefin,':nbrparticipant'=>$nbrparticipant,':nbrvue'=>$nbrvue,':image'=>$image, ':description'=>$description);
            $req->bindValue(':id_evenement', $id);
            $req->bindValue(':nom_evenement',$nom_evenement);
            $req->bindValue(':datedebut',$datedebut);
            $req->bindValue(':datefin',$datefin);
            $req->bindValue(':nbrparticipant',$nbrparticipant);
            $req->bindValue(':nbrvue',$nbrvue);
            $req->bindValue(':image',$image);
            $req->bindValue(':description',$description);

            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function modifierEvenementdes($evenement,$id){
        $db = config::getConnexion();
        $sql="UPDATE evenement SET  nbrparticipant=:nbrparticipant  where id_evenement=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);


            $nbrparticipant=$evenement->getNbrparticipant();
            $datas = array(':nbrparticipant'=>$nbrparticipant);

            $req->bindValue(':nbrparticipant',$nbrparticipant-1);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function modifierEvenementvue($evenement,$id){
        $db = config::getConnexion();

        $sql="UPDATE evenement SET  nbrvue=:nbrvue  where id_evenement=$id";


        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);


            $nbrvue=$evenement->getNbrvue();
            $datas = array(':nbrvue'=>$nbrvue);

            $req->bindValue(':nbrvue',$nbrvue+1);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function recupererEvenement($id){
        $db = config::getConnexion();

        $sql="SELECT * from evenement where id_evenement=$id";


        try{
            $liste=$db->query($sql);

            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function rechercherListepromotion($par){
        $sql="SELECT * from evenement where nom_evenement=$par";
        $db = config::getConnexion();
        echo $par;
        try{
            $liste=$db->query($sql);
            echo"nnn";
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function totaleparticipant()
    {

        $sql="SELECT nbrparticipant from evenement ";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
           // echo"nnn";
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

}

?>