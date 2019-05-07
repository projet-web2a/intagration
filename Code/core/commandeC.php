<?php 
require_once 'config.php';
	class commandeC
	{
      public function recupererDernierCmd()
      {
         
        $sql="SELECT * FROM commande WHERE idCommande=(SELECT MAX(idCommande) FROM commande)";
       $db=config::getConnexion();
        $result= $db->query($sql);
        return $result;
      }
   function getMailCommande($idCommande)
    {
      $db = config::getConnexion();
      $sql = '   SELECT email ,idcommande from commande join client on client.username=commande.username where idCommande=:idCommande';
      $req = $db->prepare($sql);
      $req->bindValue(':idCommande',$idCommande);
      $req->execute();
      $result = $req->fetch(PDO::FETCH_OBJ);
      return $result;
    }
    
      public function ajouterCommande($commande)
      {
        $sql="INSERT INTO `commande` (`dateCommande`,`etat`,`username`,`prixTotal`) VALUES (:DATECOMMANDE,:ETAT,:username,:PRIXTOTAL);";
          $db = Config::getConnexion();
          $req=$db->prepare($sql);
          $req->bindValue(':DATECOMMANDE',$commande->get_dateCommande());
          $req->bindValue(':ETAT',$commande->get_etat());
           $req->bindValue(':username',$commande->get_username());
           $req->bindValue(':PRIXTOTAL',$commande->get_prixTotal());
          
          $req->execute();
      }
    
      public function validerCommande($idCommande)
      {
         $sql="UPDATE commande SET etat='valide' WHERE idCommande=:idCommande";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
        $req->bindValue(':idCommande',$idCommande);
        $req->execute();
   }
catch (Exception $e)
   {
  echo " Erreur ! ".$e->getMessage();
   }
      }

      public function chercherCommande($par,$valeur)
      {
          $sql="SELECT *from commande  where $par='$valeur' ";
          $db = config::getConnexion();
          try{
            $result=$db->query($sql);
            

            $result->execute();
            $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
                  return $listcommandes;
          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          }
      }
      public function trier($par)
      {
        $sql="SELECT * FROM commande order by $par ;";
          $db = config::getConnexion();
          try{
          $result=$db->query($sql);

        $result->execute();
        $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
        return $listcommandes;

          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          } 
      }
      public function afficherCommande()
      {
        $db = config::getConnexion();
      $sql ="SELECT * FROM commande ";

        $result =$db->query($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $result->execute();
        $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
        return $listcommandes;
      }

      public function notif()
      {
        $db = config::getConnexion();
        $date=date("Y-m-d");
      $sql ="SELECT count(*) as nb , idCommande FROM commande where dateCommande='$date' and etat='en cours' ";

        $result =$db->query($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $result->bindValue(':date',$date);
        $result->execute();
        $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
        return $listcommandes;
      }
       public function afficher_notif()
      {
        $db = config::getConnexion();
        $date=date("Y-m-d");
      $sql ="SELECT * FROM commande where dateCommande='$date' and etat='en cours' ";

        $result =$db->query($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $result->bindValue(':date',$date);
        $result->execute();
        $listcommandes= $result->fetchALL(PDO::FETCH_OBJ);
        return $listcommandes;
      }
      

      public function afficher_ProduitsCommande($idCommande)
      {
        $db = config::getConnexion();
      $sql ="SELECT  P.refe , P.mar , P.prix , L.quantiteCommandee from produit P join lignecommande L  ON P.refe=L.refe  and L.idCommande=:idCommande ";

        $req=$db->prepare($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $req->bindValue(':idCommande',$idCommande);
        $req->execute();
        $listproduit= $req->fetchALL(PDO::FETCH_OBJ);
        return $listproduit;
      }
      public function afficher_facture($idCommande)
      {
        $db = config::getConnexion();
      $sql =" SELECT  P.refe , P.mar , P.prix , L.quantiteCommandee, C.PrixTotal , C.dateCommande, C.idCommande from produit P join lignecommande L  ON P.refe=L.refe  join commande C on C.idCommande=L.idCommande WHERE L.idCommande=:idCommande ";
 
        $req=$db->prepare($sql);//cette fonction permet seulement la lecture ,permet de retourner un tableau de données
        $req->bindValue(':idCommande',$idCommande);
        $req->execute();
        $listproduit= $req->fetchALL(PDO::FETCH_OBJ);
        return $listproduit;
      }
     
         public function SupprimerCommande($idCommande)
      {
           $sql1="DELETE from lignecommande  where idCommande='$idCommande' ";

          $sql="DELETE from commande  where idCommande='$idCommande' ";

          $db = config::getConnexion();
          try{
                        $result1=$db->query($sql1);

            $result=$db->query($sql);

      

            $result1->execute();
                      $result->execute();

          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          }
      }

  
	}

?>
