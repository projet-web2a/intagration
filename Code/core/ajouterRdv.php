<?php
require '../entities/rdv.php';
require 'rdvC.php';

if (isset($_POST['date']) and isset($_POST['time']) and isset($_POST['names'])){

//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
if($_POST['date']=="" or $_POST['time']=="" or $_POST['names']=="")
{
	echo "<script type='text/javascript'>";
echo "alert('Please no empty fields!!');
             window.location.href='../views/front/sendRdv.php';";
echo "</script>";
	
}
else if (  strtotime($_POST['date']) > strtotime('now'))
{
	 $rdv1=new Rdv($_POST['date'],$_POST['time'],$_POST['names'],$_POST['username']);
     $rdv1C=new RdvC();
	 $time=$rdv1C->rechercherProduit($_POST['names'],$_POST['date'],$_POST['time']) ;
	 
	 if($time>=1)
	 {
		  echo "<script type='text/javascript'>";
       echo "alert('This product has already been reserved on that time!!');
             window.location.href='../views/front/sendRdv.php';";
        echo "</script>";
	 }
	 else
	 {
     $rdv1C->ajouterRdv($rdv1);
     //header('Location: ../views/front/sendRdv.php');
	echo '<meta http-equiv="refresh" content="0; URL=../views/front/dispalyRdvFront.php" />';
		
     }
}
else 
{
	
	 //echo "nom doit etre une chaine!";
	    echo "<script type='text/javascript'>";
       echo "alert('Please enter the date correctly!!');
             window.location.href='../views/front/sendRdv.php';";
        echo "</script>";
}	
}
?>