<?php
include_once 'clientC.php';
	if(isset($_POST['username']) && isset($_POST['pwd']))
{
	
	
	$clientC = new ClientC();
    $result=$clientC->verifierlogin($_POST['username'],$_POST['pwd']);
	
	if(empty($result))
	        {
             echo "<script type='text/javascript'>";
             echo "alert('Username or password is incorrect!');
             window.location.href='../views/front/index1.php';";
             echo "</script>";
              return;
            }
			else 
			{
				
				
				session_start();
		        $_SESSION['username'] = $result[0]->username;
		        $_SESSION['pwd'] = $result[0]->pwd;
		       
				$user=$_SESSION['username'];
		     echo "<script type='text/javascript'>";
             echo "alert('Welcome!');
             window.location.href='../views/front/Profil.php?action=yes';";
             echo "</script>";
              return;
			}

}




 ?>