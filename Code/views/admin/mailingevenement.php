
<?php
session_start();
if (empty($_SESSION['id']))
{

    header('Location: login.php');

    /*  echo 'Votre login est <b>'.$_SESSION['l'].'</b> <br>et votre mot de passe est <b>'.$_SESSION['p'].
        '</b><br>Votre role est : '.$_SESSION['r'].' <br/> Identifiant de la session est :'.session_id().'</br>';
    echo '<a href="./logout.php">Cliquer pour se déconnecter</a>';
    */
}

?>
<HTML>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EyeZone Login</title>
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
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1>EyeZone</h1>
                            </div>
                            <h2>Invitation pour un événement</h2>
                            <?PHP
                            include "../../entities/evenement.php";
                            include "../../core/evenementC.php";

                            if (isset($_POST['id_evenement'])){

                                $evenementC=new EvenementC();
                                $result=$evenementC->recupererEvenement($_POST['id_evenement']);
                                foreach($result as $row){

                                    // $id_evenement=$row['id_evenement'];
                                    $description=$row['description'];
                                    $image=$row['image'];
                                    ?>
                                    <form method="POST" action="envoyermail.php">
                                        <table>
                                          <tr>
                                          <td>Destination</td>

                                                <td><input id="destination" type="text" name="destination" required data-msg="Entrez la description de l'événement" class="input-material"></td>    <!--   <label for="destination" class="label-material">Destination</label>
-->
                                            </tr>
                                            <tr>
                                            <td>Description</td>
                                            <td><input  class="input-material" type="text" name="description"  value="<?PHP echo $description ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>Image</td>
                                                <td><input  class="input-material" type="text" name="image"  value="<?PHP echo $image ?>"></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="envoyer" value="envoyer"></td>
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
            </div>
        </div>
    </div>
    <div class="copyrights text-center">
        <p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
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