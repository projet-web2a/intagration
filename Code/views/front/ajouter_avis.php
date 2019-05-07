<?php  session_start(); ?>
<?php
if (empty($_SESSION['username']))
header('location: avis.php?login=1');


?>
<?php
require '../../entities/avis.php';
require '../../core/avisC.php';
if(isset($_GET['refe']) && isset($_GET['marque']))
{

$marque=$_GET['marque'];
$refe=$_GET['refe'];
}
if(isset($_POST['star5']))
{
$note=5;
}
else if (isset($_POST['star4'])) {
$note=4;
}
else if (isset($_POST['star3'])) {
$note=3;

}
else if (isset($_POST['star2']))
{
$note=2;


}
else if (isset($_POST['star1'])) {
$note=1;

}

$username=$_SESSION['username'];
if (isset($_POST['commentaire']))
{
$av=new avis($marque,$_POST['commentaire'],$note,$refe,$username);

$av1=new avisC();
$av1->ajouter_avis($av);
header('Location: avis.php');
}
?>