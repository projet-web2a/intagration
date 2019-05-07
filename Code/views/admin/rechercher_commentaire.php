<?php
   require '../../core/avisC.php';

    if(isset($_POST["search"]))

  {	

  $search=$_POST['search'];
	
	header("location: afficher_commentaire.php");}
	else  {
		echo "erreur";
	}
	//$reclamation = Reclamation::rechercher("prix");	
	//include ("afficherProduit.php");

?>