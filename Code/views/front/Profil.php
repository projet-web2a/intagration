<?php  session_start(); ?>
<?php 
require "../../entities/client.php";
require "../../core/clientC.php";

if(empty($_SESSION["username"]))
{
	echo "<script type='text/javascript'>";
echo "alert('please login first!');
window.location.href='index1.php';";
echo "</script>";

}
else
{
	$user=$_SESSION["username"];
$clientC=new ClientC();
$result=$clientC->recupererClient($user);
foreach($result as $client) { 
            
            $prenom=$client->prenom;
			$nom=$client->nom;
            $user=$client->username;
            $pwd=$client->pwd;
			$email=$client->email;
			$num=$client->num;
			$city=$client->city;
			$sexe=$client->sexe;
          }
}		  
		  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>My Profile</title>
	<script language ="JavaScript" src="js/testjava.js" > </script>
  </head>
  <body>
     <div class="card text-white bg-dark mb-6 align-items-center" style="max-width: 120rem;">
  <div class="card-header">
    <h1 class="card-title text-center">My Profile</h1>
  </div>
  <div class="card-body ">
	<div class="card text-white bg-secondary mb-3" style="max-width: 54rem;">
  <div class="card-body">
  <!-- Form -->
    <form method="POST"  name="f" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first" class="form-control" id="inputEmail4" value="<?PHP echo $prenom ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" name="last" class="form-control" id="inputPassword4" value="<?PHP echo $nom ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail5">User Name</label>
      <input type="text" name="username" class="form-control" id="inputEmail5" value="<?PHP echo $user ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail6">Password</label>
      <input type="text"  name="pwd" class="form-control" id="inputEmail6" value="<?PHP echo $pwd ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Email</label>
    <input type="email" name="mail" class="form-control" id="inputAddress" value="<?PHP echo $email ?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
  
      <label for="inputCity">Mobile Num</label>
      <input type="text" name="num" class="form-control" id="inputCity" value="<?PHP echo $num ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">City</label>
      <select id="inputState" name="choixCity" class="form-control">
        <option selected ><?PHP echo $city ?></option>
        <option>Ariana</option>
        <option>Ben Arous</option>
        <option>Manouba</option>
        <option>Tunis</option>
      </select>
    </div>
   <div class="form-group col-md-4">
      <label for="inputState">Gender</label>
      <select id="inputState" name="gender" class="form-control">
        <option selected ><?PHP echo $sexe ?></option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
  </div>
 <button type="submit"   name="Modify" class="btn btn-primary submit mb-4" style="background-color:#F25613" >Edit</button>
  <div><button type="submit"  value="Sign Up" name="Delete" class="btn btn-primary submit mb-4" style="background-color:#F25613" >Desactivate my Account</button></div> 
   <label for="inputCity">Want to go back ?</label><a href="index1.php?action=yes">
			Home</a><a href="../Projet%20web/front/index.html"> </a>
</form>
  </div>
  </div>
</div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
if (isset($_POST['Modify']))
{
 
 	
 	if($_POST['first']=="" or $_POST['last']=="" or $_POST['username']=="" or $_POST['pwd']=="" or $_POST['mail']=="" or $_POST['num']=="" or $_POST['choixCity']=="")
	{
		echo "<script type='text/javascript'>";
        echo "alert('please check your modification!');
        window.location.href='../front/Profil.php?username=$user';";
        echo "</script>";
	}
	else
	{
		if(ctype_alpha($_POST['first'])==true && $_POST['last']==true)
		{
			$client = new Client($_POST['first'],$_POST['last'],$_POST['username'],$_POST['pwd'],$_POST['mail'],$_POST['num'],$_POST['choixCity'],$_POST['gender']);
            $e= new ClientC();
            $e->modifierClient($client,$_POST['username']);
		}
		else
		{
		echo "<script type='text/javascript'>";
        echo "alert('Your First and last name needs to be only letters!');
        window.location.href='../front/Profil.php?username=$user';";
        echo "</script>";
		}
	}

}
if (isset($_POST["Delete"])){
	
	$ec= new ClientC();
	$ec->supprimerClient($_POST["username"]);
	echo '<meta http-equiv="refresh" content="0; URL=index1.php" />';
}
 
?>


  </body>
  </html>