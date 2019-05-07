<?php

require_once 'config.php';
class reclamationC 
{
	
function ajouter_reclamation($reclamation){
		$sql="insert into reclamation (sujet,refe,description,username,date_reclamation) values (:sujet, :refe,:description,:username,:date_reclamation)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $sujet=$reclamation->get_sujet();
        $refe=$reclamation->get_refe();
        $description=$reclamation->get_description();
        $username=$reclamation->get_username();
        $date_reclamation=$reclamation->get_date_reclamation();
		$req->bindValue(':sujet',$sujet);
		$req->bindValue(':refe',$refe);
		$req->bindValue(':description',$description);
		$req->bindValue(':username',$username);
		$req->bindValue(':date_reclamation',$date_reclamation);
		
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        }	
        function afficher_reclamations()
	{
  		$db = config::getConnexion();
       		$sql="SELECT *FROM reclamation";

		try{
 		$req=$db->prepare($sql);
 	    $req->execute();
 		$reclamation= $req->fetchALL(PDO::FETCH_OBJ);
		return $reclamation;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}



    function SupprimerReclamation($id_reclamation)
    {
        $sql="DELETE  from reclamation where id_reclamation=$id_reclamation";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
}
 function modifier_reclamation($id_reclamation)
    {
        $sql="UPDATE   reclamation  set etat= 'valide' where id_reclamation=$id_reclamation";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
 public function trier_reclamation_desc()
      {

        $sql="SELECT *FROM reclamation order by date_reclamation DESC ";


          $db = config::getConnexion();
          try{
          $req=$db->query($sql);
            $liste= $req->fetchALL(PDO::FETCH_OBJ);
          return $liste;
          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          } 
      }
       public function trier_reclamation_asc()
      {

        $sql="SELECT *FROM reclamation order by date_reclamation ASC ";


          $db = config::getConnexion();
          try{
          $req=$db->query($sql);
            $liste= $req->fetchALL(PDO::FETCH_OBJ);
          return $liste;
          }
          catch (Exception $e){
            die('Erreur: '.$e->getMessage());
          } 
      }
        function rechercher_reclamation($refe)
    {
        $sql="SELECT * FROM reclamation WHERE refe='$refe'";
         //connexion bd
        $db = config::getConnexion();
                try{
        $req=$db->prepare($sql);
        $req->execute();
        $reclamation= $req->fetchALL(PDO::FETCH_OBJ);
        return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   

         
    }
            function recuperer_produit()
    {
        $sql="SELECT * FROM produit ";
        $db = config::getConnexion();
                try{
        $req=$db->prepare($sql);
        $req->execute();
        $reclamation= $req->fetchALL(PDO::FETCH_OBJ);
        return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   

         
    }
      function getMailReclamtion($id_reclamation)
    {
      $db = config::getConnexion();
      $sql = '   SELECT email ,id_reclamation from reclamation join client on client.username=reclamation.username where id_reclamation=:id_reclamation';
      $req = $db->prepare($sql);
      $req->bindValue(':id_reclamation',$id_reclamation);
      $req->execute();
      $result = $req->fetch(PDO::FETCH_OBJ);
      return $result;
    }
    
}
?>