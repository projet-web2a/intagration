<?php
   require '../../core/reclamationC.php';

    if(isset($_POST["search"]))

  {	

  $search=$_POST['search'];
	
	header("location: afficher_reclamation.php");}
	else  {
		echo "erreur";
	}
	//$reclamation = Reclamation::rechercher("prix");	
	//include ("afficherProduit.php");

?>