<?php

require_once 'config.php';
class avisC 
{
	
function ajouter_avis($avis){
		$sql="insert into avis (marque,commentaire,note,refe,username) values (:marque,:commentaire,:note,:refe,:username)";
		$db = config::getConnexion();





    
		try{
        $req=$db->prepare($sql);
		
        
        $marque=$avis->get_marque();
        $commentaire=$avis->get_commentaire();
        $note=$avis->get_note();
        $refe=$avis->get_refe();
        $username=$avis->get_username();


		
        $req->bindValue(':marque',$marque);

		$req->bindValue(':commentaire',$commentaire);
		$req->bindValue(':note',$note);
        $req->bindValue(':refe',$refe);
                $req->bindValue(':username',$username);


		
        $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        }	
        function afficher_avis()
	{
  		$db = config::getConnexion();
       		$sql="SELECT id_avis, marque  ,note ,COUNT(*) as nbavis , SUM(note)/COUNT(*) as notemoyenne FROM avis GROUP by marque ";

		try{
 		$req=$db->prepare($sql);
 	    $req->execute();
 		$avis= $req->fetchALL(PDO::FETCH_OBJ);
		return $avis;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
    function afficher_commentaire($marque)
  {
      $db = config::getConnexion();
          $sql="SELECT * from avis where marque=:marque  ";

    try{
    $req=$db->prepare($sql);
            $req->bindValue(':marque',$marque);

      $req->execute();
    $avis= $req->fetchALL(PDO::FETCH_OBJ);
    return $avis;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
  }
      function recuperer_produit()
  {
      $db = config::getConnexion();
          $sql="SELECT distinct mar FROM produit";

    try{
    $req=$db->prepare($sql);
      $req->execute();
    $listeproduits= $req->fetchALL(PDO::FETCH_OBJ);
    return $listeproduits;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
  }
        
        function list_produit($mar)
  {
      $db = config::getConnexion();
          $sql="SELECT  * FROM produit where mar='$mar'";

    try{
    $req=$db->prepare($sql);
      $req->execute();
    $listeproduits= $req->fetchALL(PDO::FETCH_OBJ);
    return $listeproduits;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
  }
          function list_produit_refe($refe)
  {
      $db = config::getConnexion();
          $sql="SELECT  * FROM produit where refe=$refe";

    try{
    $req=$db->prepare($sql);
      $req->execute();
    $listeproduits= $req->fetchALL(PDO::FETCH_OBJ);
    return $listeproduits;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
  }



    function Supprimer_avis($id_avis)
    {
        $sql="DELETE  from avis where id_avis=$id_avis";
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
 function modifier_avis($id_avis)
    {
        //$sql="UPDATE   avis  set etat= 'valide' where id_reclamation=$id_reclamation";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}
 public function trier_avis_desc()
      {

        $sql="SELECT *FROM avis order by date_avis DESC ";


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
       public function trier_avis_asc()
      {

        $sql="SELECT *FROM avis order by date_avis ASC ";


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
        function rechercher_avis($marque)
    {
        $sql="SELECT * FROM avis WHERE marque=$marque";
         //connexion bd
        $db = config::getConnexion();
                try{
        $req=$db->prepare($sql);
        $req->execute();
        $avis= $req->fetchALL(PDO::FETCH_OBJ);
        return $avis;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   

         
    }
}
?>