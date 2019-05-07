<?php
session_start();

if (empty($_SESSION['id'])   )
{

    $login='0000';

    $role='visiteur';

}
else
{
    $login=$_SESSION['id'];
    
}
include_once "../../core/evenementC.php";
include_once "../../core/promotionC.php";
$promotionC=new PromotionC();
$evenement=new EvenementC();
$listepromotion=$promotionC->afficherPromotion();
//$nbr=$listepromotion->rowcount();
$listenbr=$evenement->totaleparticipant();
$nbr=0;
foreach ($listenbr as $ro)
{
    $nbr=$ro['nbrparticipant']+$nbr;
}
$listevenement=$promotionC->afficherEvenement();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EyeZone | Marketing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
<div class="page">
    <!-- Main Navbar-->
    <header class="header">
        <nav class="navbar">
            <!-- Search Box-->
            <div class="search-box">
                <button class="dismiss"><i class="icon-close"></i></button>
                <form id="searchForm" action="#" role="search">
                    <input type="search" placeholder="What are you looking for..." class="form-control">
                </form>
            </div>
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <!-- Navbar Header-->
                    <div class="navbar-header">
                        <!-- Navbar Brand --><a href="index.php" class="navbar-brand d-none d-sm-inline-block">
                            <div class="brand-text d-none d-lg-inline-block"> EyeZone</div>
                            <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                        <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <!-- Navbar Menu -->
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <!-- Search-->
                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                        <!-- Notifications-->
                        <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner"><?php echo $nbr ?></span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <?php foreach ($listevenement as $row){


                                    ?>
                                    <li><a rel="nofollow" href="#" class="dropdown-item">

                                            <div class="notification">
                                                <div class="notification-content"><i class="fa fa-envelope bg-green"></i><?php echo $row["nom_evenement"]?></div>
                                                <div class="notification-time"><small><?PHP echo $row["nbrparticipant"] ?></small></div>
                                            </div></a></li>
                                    <?php
                                }
                                ?>

                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                            </ul>
                        </li>
                        <!-- Messages                        -->
                        <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner">10</span></a>
                            <ul aria-labelledby="notifications" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                                        <div class="msg-body">
                                            <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                                        </div></a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages   </strong></a></li>
                            </ul>
                        </li>
                        <!-- Languages dropdown    -->
                        <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                            <ul aria-labelledby="languages" class="dropdown-menu">
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2">German</a></li>
                                <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2">French                                         </a></li>
                            </ul>
                        </li>
                        <!-- Logout    -->
                        <li class="nav-item"><a href="../../core/logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
         <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Wafa Rabeh</h1>
              <p> Manager</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class=""><a href="index.php"> <em class="icon-home"></em>  Home </a></li>
			
               <li class=""><a href="admin_v.php"> <em class="icon-home"></em>  Admin </a></li>
             <li class=""><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Stock </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="produit_v.php">Produit</a></li>
                <li><a href="categorie_v.php">Categorie</a></li>
				
                
              </ul>
            </li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Commande </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="listedescommandes.php">Liste Des Commandes</a></li>
                <li><a href="produit_commande.php">Produits D'une Commande</a></li>
                <li><a href="statistiqueDesCommandes.php">Statistiques Des Commandes</a></li>
              </ul>
            </li>
            <li><a href="clients.php"> <i class="fa fa-users"></i>Clients </a></li>
            <li class="active"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Marketing </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
               <li><a href="espacevenement.php">Evenement</a></li>
                        <li><a href="espacepromotion.php">Promotion</a></li>
                
              </ul>
            </li>
           <li <li class=""><a href="livraison.php"> <i class="icon-interface-windows"></i>Livraisons </a></li>
            <li><a href="afficherlivreur.php"> <i class="icon-interface-windows"></i>Livreur </a></li>
           <li class="" ><a href="serviceapresvente.php"> <i class="icon-interface-windows"></i>service aprés vente </a></li>
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li class=""> <a href="displayRdv.php"> <i class="icon-mail"></i>RendezVous </a></li>
            <li> <a href="confirmRdv.php"> <i class="icon-mail"></i>Demo </a></li>
            <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
          </ul>
        </nav>
        <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Marketing</h2>
                </div>
            </header>
            <!-- Breadcrumb-->
            <div class="breadcrumb-holder container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Promotion</li>
                </ul>
            </div>
                            <?PHP
                            include "../../entities/promotion.php";

                            $promotion1C=new PromotionC();
                            $listePromotion1=$promotion1C->afficherPromotion();
                        // $maction='trier';
                          //  $maction=$_GET['maction'];
                            if(isset($_GET['maction']))
                            {$maction=$_GET['maction'];
                            echo $maction;


                                $par=$_GET['par'];
                                if ($maction=='trier')
                                $listePromotion1=$promotion1C->trier($par);

                            }


                            //var_dump($listeEmployes->fetchAll());
                            ?>
                            <table class="table table-bordered table-dark">
                                <tr>
                                    <td scope="col" class="bg-primary">Date debut de la promotion</td>
                                    <td scope="col" class="bg-primary">Date fin de la promotion</td>
                                    <td scope="col" class="bg-primary">La réference</td>
                                    <td scope="col" class="bg-primary">La description</td>
                                    <td scope="col" class="bg-primary">Le taux</td>
                                    <td scope="col" class="bg-primary">Le prixfinal</td>
                                    <td scope="col" class="bg-primary"> Action </td>
                                </tr>
                                <?PHP
                                foreach($listePromotion1 as $row){
                                    ?>
                                    <tr>

                                        <td><?PHP echo $row['datedebut']; ?></td>
                                        <td><?PHP echo $row['datefin']; ?></td>
                                        <td><?PHP echo $row['idProduit']; ?></td>
                                        <td><?PHP echo $row['categorie']; ?></td>
                                        <td><?PHP echo $row['taux']; ?></td>
                                        <td><?PHP echo $row['prixfinal']; ?></td>

                                        <td ><form method="GET" action="modifierpromotion.php">
                                                <input type="submit" name="modifier" value="modifier" class="btn btn-info">
                                                <input type="hidden" value="<?PHP echo $row['id_promotion']; ?> " name="id_promotion">
                                            </form>


                                        <td><form method="POST" action="supprimerpromotion.php" >
                                                <input type="submit" name="supprimer" value="supprimer" class="btn btn-danger">
                                                <input type="hidden" value="<?PHP echo $row['id_promotion']; ?> " name="id_promotion" >
                                            </form>


                                    </tr>

                                    <?PHP
                                }

                                ?>

                            </table>
<center>

 <br>   <a href="formulairepromotion.php" class="btn btn-primary"> ajouter</a>
    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Trier Par
    </a>

    <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item " href="espacepromotion.php?maction=trier&par=datefin">Date fin</a>
        <a class="dropdown-item " href="espacepromotion.php?maction=trier&par=prixfinal">Prix final</a>
        <a class="dropdown-item " href="espacepromotion.php?maction=trier&par=idProduit">Id produit</a>
    </div>
    <a href="index.php" class="btn btn-primary"> retour</a>

   <td>

      <br>
       <br>
       <form method="GET" action="chercherpromotion.php">
            <input type="text" class="btn btn-default dropdown-toggle" name="chercher" placeholder="Tapez le taux ">
            <input type="hidden" class="btn-danger"  value="chercher">
    </form>


</center>
                        </div>
                    </div>
                </div>

    <div class="copyrights text-center">
        <p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
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