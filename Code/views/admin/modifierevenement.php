<?php
session_start();
if (empty($_SESSION['id']) )
{

    header('Location: login.php');

    /*  echo 'Votre login est <b>'.$_SESSION['l'].'</b> <br>et votre mot de passe est <b>'.$_SESSION['p'].
        '</b><br>Votre role est : '.$_SESSION['r'].' <br/> Identifiant de la session est :'.session_id().'</br>';
    echo '<a href="./logout.php">Cliquer pour se déconnecter</a>';
    */
}
$login=$_SESSION['id'];

include "../../core/promotionC.php";

include_once "../../core/evenementC.php";
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
    <!-- select-->
    <link rel="stylesheet" href="css/select.style.css">

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
                    <li class="breadcrumb-item active">Marketing</li>
                </ul>
            </div>
                            <?PHP
                            include "../../entities/evenement.php";
                            if (isset($_GET['id_evenement'])){

                                $evenementC=new EvenementC();
                                $result=$evenementC->recupererEvenement($_GET['id_evenement']);
                                foreach($result as $row){

                                   // $id_evenement=$row['id_evenement'];
                                    $nom_evenement=$row['nom_evenement'];
                                    $datedebut=$row['datedebut'];
                                    $datefin=$row['datefin'];
                                    $nbrparticipant=$row['nbrparticipant'];
                                    $nbrvue=$row['nbrvue'];
                                    $image=$row['image'];
                                    $description=$row['description'];

                                    ?>
                                    <form method="POST" action="modifierev.php">
                                        <table>

                                            <tr>
                                                <div class="form-group"></div>
                                                <td><strong>Nom</strong></td>
                                                <td><input type="text" name="nom_evenement" value="<?PHP echo $nom_evenement ?>"></td>
        </div>
                                            </tr>
                                            <tr>
                                                <div class="form-group">

                                                <td><strong>Date debut</strong></td>
                                                <td><input type="date" name="datedebut" value="<?PHP echo $datedebut ?>"></td>
                                                </div>
                                            </tr>

                                            <tr>
                                                <td><strong>Date fin</strong></td>
                                                <td><input type="date" name="datefin" value="<?PHP echo $datefin ?>"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nombre de participant</strong></td>
                                                <td><input type="number" name="nbrparticipant" value="<?PHP echo $nbrparticipant ?>"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nombre de vue</strong></td>
                                            <td><input type="number" name="nbrvue" value="<?PHP echo $nbrvue ?>"></td>
                                            </tr>
                                            <td><strong>Image</strong></td>
                                            <td><input type="file" name="image" value="<?PHP echo $image ?>"></td>
                                            </tr>
                                            <tr>
                                            <td><strong>Description</strong></td>
                                            <td><input type="text" name="description" value="<?PHP echo $description ?>"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="modifier" value="modifier"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="hidden" name="id_ini"  class="btn btn-primary" value="<?PHP echo $_GET['id_evenement'];?>"></td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?PHP
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>

?>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="copyrights text-center">
    <p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
    </p>
</div>


<!-- JavaScript files-->
<script>
    function compar()
    {
        // var sdate1 = document.getElementById('Datedebut').value;
        var date1 = new Date(document.getElementById('Datedebut').value);
        var date2 = new Date(document.getElementById('Datefin').value);


        if(date1>date2)
        {
            alert('Vous avez selectionné une date incorrecte!!');
        }


    }
</script>
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