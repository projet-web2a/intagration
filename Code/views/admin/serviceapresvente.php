<?php 


require '../../core/reclamationC.php';
require '../../core/avisC.php';

$reclamation=new reclamationC();
$avis=new avisC();
$marque="";
$listereclamations=$reclamation->afficher_reclamations();
$listeavis=$avis->afficher_avis();

if(isset($_GET['marque']))
{
  $marque=$_GET['marque'];
}
$listecommentaire=$avis->afficher_commentaire($marque);


$maction=''; 
if(isset($_POST['search'])) 
{
	$listereclamations=$reclamation->rechercher_reclamation($_POST['search']);


}
$maction=''; 
if(isset($_POST['search'])) 
{
  //$listeavis=$avis->rechercher_avis($_POST['search']);


}
 if(isset($_GET['maction']))
          	{$maction=$_GET['maction'];}
if($maction=="trier_reclamation_desc") 
{
	$listereclamations=$reclamation->trier_reclamation_desc();
}

else if($maction=="trier_reclamation_desc") 
{
	$listereclamations=$reclamation->trier_reclamation_desc();
}


if(isset($_GET['maction']))
            {$maction=$_GET['maction'];}
if($maction=="trier_avis_desc") 
{
  $listeavis=$avis->trier_avis_desc();
}

else if($maction=="trier_avis_asc") 
{
  $listeavis=$avis->trier_avis_asc();
}





?>
<!DOCTYPE html>
<html>
  <?php require 'head.php';?>
  <body>
    <div class="page">
      <!-- Main Navbar-->
       <?php require 'navbar1.php';?>

      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <?php require'sidebar.php';?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Produits</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Produits</li>
            </ul>
          </div>
         




<section class="tables" > 

            <div class="container-fluid">
              <div class="row">
                <div>
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>valider</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Basic Table</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                      	<!-- <a type="button" class="btn btn-dark" href="serviceapresvente.php?maction=trier_reclamation_asc">Trier Par Date croissant</a>
                      	 <a type="button" class="btn btn-dark" href="serviceapresvente.php?maction=trier_reclamation_desc">Trier Par Date decroissant</a>
                      	 <div class="dropdown"> -->
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Trier Par
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="serviceapresvente.php?maction=trier_reclamation_asc">Trier Par Date croissant</a>
    <a class="dropdown-item" href="serviceapresvente.php?maction=trier_reclamation_desc">Trier Par Date decroissant</a>
  </div>

  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="serviceapresvente.php?maction=trier_avis_asc">Trier Par Date croissant</a>
    <a class="dropdown-item" href="serviceapresvente.php?maction=trier_avis_desc">Trier Par Date decroissant</a>
  </div>
  <nav class="navbar navbar-light bg-light">
  <form class="form-inline" method="post">
    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



<i




  </form>
      <a class="btn btn-success my-2 my-sm-0" type="submit" href="serviceapresvente.php">Reset</a>
<a class="btn btn-primary" type="submit" href="serviceapresvente.php?stat=1">statistiques</a>

</nav>
</div>
<button type="button" class="btn btn-primary">RECLAMATIONS</button>


 						<table class="table table-bordered table-hover table-dark ">
  						<thead >
							    <tr>
      <th scope="col">sujet</th>
      <th scope="col">reference</th>
      <th scope="col">description</th>
      <th scope="col">Etat</th>
      <th scope="col">username</th>
      <th scope="col">date reclamation </th>
      <th scope="col"> Action </th>

							     
							    </tr>
							  </thead>
							  <tbody>
							<?php foreach($listereclamations as $reclamation): ?>
							    <tr>
							      <td> <?= $reclamation->sujet; ?> </td>
							      <td> <?= $reclamation->refe ?> </td>
							      <td> <?= $reclamation->description; ?> </td>
							      <td> <?= $reclamation->Etat; ?> </td>
							      <td> <?= $reclamation->username; ?> </td>
							      <td> <?= $reclamation->date_reclamation; ?> </td>

							      <td>
							             
							              <a  href="modifier_reclamation.php?id=<?= $reclamation->id_reclamation ?> " class="btn btn-info"> valider </a>
							              <a onclick="return confirm('Are you sure you want to delete this entry ?')" href="Supprimer_reclamation.php?id=<?= $reclamation->id_reclamation ?>" class="btn btn-danger"> Delete </a>
							            </td>
							    </tr>
							  </tbody>
							            <?php endforeach; ?>

							</table>




              <table class="table table-bordered table-hover table-dark ">
                <button type="button" class="btn btn-primary">AVIS</button>

              <thead >
                  <tr>
                    <th scope="col">marque</th>
                    <th scope="col">nombre avis</th>
                    <th scope="col">note moyenne</th>
                    <th scope="col">action</th>



                   
                  </tr>
                </thead>
                <tbody>

              <?php foreach($listeavis as $avis): ?>
                  <tr>
                    <td> <?php echo $avis->marque ?> </td>
                    <td> <?= $avis->nbavis ?> </td>

                    <td> <?= $avis->notemoyenne; ?> </td>                           
                          <td>
                           
                            <a  href="serviceapresvente.php?marque=<?= $avis->marque ?> " class="btn btn-info"> Voir les commentaires </a>
                            
                          </td> 
                  </tr>
                </tbody>
                          <?php endforeach; ?>

              </table>





 <table class="table table-bordered table-hover table-dark ">

                <button type="button" class="btn btn-primary">Commentaires de <?=$marque ?> </button>
  <thead >
                  <tr>
                    
                    <th scope="col">commentaire </th>
                    <th scope="col">reference </th>
                    <th scope="col">nom utilisateur </th>

 </tr>
                </thead>
                <tbody>

              <?php foreach($listecommentaire as $avis): ?>
                  <tr>
                  

                    <td> <?= $avis->commentaire; ?> </td>                           
                     <td> <?= $avis->refe; ?> </td>                           
                    <td> <?= $avis->username; ?> </td>                           
                         
                          
                  </tr>
                </tbody>
                          <?php endforeach; ?>

              </table>
              <div>
                <?php if (isset($_GET['stat'])) { ?>
<button type="button" class="btn btn-primary">statistique reclamation</button>
</div>
<?php require_once 'statistique_reclamation.php' ; ?>
<?php }?>
                      </div>
                    </div>
                  </div>
                </div>
          </section>







          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>EyeZone</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>&nbsp;</p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>




   
  </body>
</html>