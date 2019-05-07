<?php
   require '../../core/avisC.php';

    if(isset($_POST["search"]))

  {	

  $search=$_POST['search'];
	
	header("location: afficher_avis.php");}
	else  {
		echo "erreur";
	}
	

?>