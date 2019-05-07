<?php
require '../entities/client.php';
require 'clientC.php';

if (isset($_POST['first']) and isset($_POST['last']) and isset($_POST['username']) and isset($_POST['pwd']) and isset($_POST['mail']) and isset($_POST['num']) and isset($_POST['choixCity']) and isset($_POST['gender']))
{

//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
if($_POST['first']=="" or $_POST['last']=="" or $_POST['username']=="" or $_POST['pwd']=="" or $_POST['mail']=="" or $_POST['num']=="" or $_POST['choixCity']=="Choose..." )
{
		echo "<script type='text/javascript'>";
echo "alert('please check your registration!');
window.location.href='../views/front/register.html';";
echo "</script>";
}
else if (ctype_alpha($_POST['first'])==true && ctype_alpha($_POST['last'])==true && ctype_alnum($_POST['username'])==true)
{
	$client1=new Client($_POST['first'],$_POST['last'],$_POST['username'],$_POST['pwd'],$_POST['mail'],$_POST['num'],$_POST['choixCity'],$_POST['gender']);
     $client1C=new ClientC();
     $client1C->ajouterClient($client1);
     header('Location: ../views/front/index1.php');
		
     
}
else 
{
	
	 //echo "nom doit etre une chaine!";
	    echo "<script type='text/javascript'>";
        echo " alert('Your First and last name needs to be only letters and your username can not contain symbols!');
		window.location.href='../views/front/register.html';";
        echo "</script>";
}

		
	


}
?>