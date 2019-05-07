<?PHP
include "../../entities/promotion.php";
include "../../core/promotionC.php";
require_once '../../lib/phpmailer/PHPMailerAutoLoad.php';
$promotion1C=new PromotionC();

$dsc=$promotion1C->recupererdesc($_POST['IdProduit']);

$promotion1=new Promotion(0,$_POST['Datedebut'],$_POST['Datefin'],$_POST['IdProduit'],$dsc['descr'], $_POST['Taux'],0,0);
$promotion=new PromotionC();

$ancienprix=$promotion1C->calculerPrix($_POST['IdProduit']);
$url=$promotion1C->recupererUrl($_POST['IdProduit']);
var_dump($ancienprix);
//$val=floatval($ancienprix);
//$resultat= array(':ancienprix'=>$ancienprix);
//echo $resultat[':ancienprix'];
$nouvprix=$ancienprix['prix']-($ancienprix['prix']*($_POST['Taux']))/100;
echo $_POST['Taux'];
//echo $val;
//$promotion1C->Ajouternote($_POST['IdProduit'],$url['url'],$nouvprix,$ancienprix['prix'],0);
//$promotion1C->Modifierproduit($_POST['IdProduit'],$_POST['Taux']);
$promotion1=new Promotion(0,$_POST['Datedebut'],$_POST['Datefin'],$_POST['IdProduit'],$dsc['descr'],$_POST['Taux'], $nouvprix,0);
//if (!empty($liste))
$bool=$promotion1C->ajouterPromotion($promotion1);

$listemail=$promotion1C->recuperermailclient();
foreach ($listemail as $row)
{
   $to = $row['email'];

   $sujet = " NOUVELLE article en Promotion!!!!!!";
   $delim = md5(uniqid(rand()));
//echo $delim;


        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; // authentication enabled
        $mail->IsHTML(true); 
        $mail->SMTPSecure = 'ssl';//turn on to send html email
        // $mail->Host = "ssl://smtp.zoho.com";
        $mail->Host = "ssl://smtp.gmail.com"; 
        $mail->Port = 465;
        $mail->Username = "userweb1998@gmail.com";
        $mail->Password = "50507635";
        $mail->SetFrom("userweb1998@gmail.com", "EyeZone");
        $mail->Subject = $sujet;

      
$mail->AddEmbeddedImage('../front/images/' . $url['url'], 'logoimg'); // attach file logo.jpg, and later link to it using identfier logoimg

$mail->Body = '<h1>'.$dsc['descr'].'</h1>
    <p> <img src=\"cid:logoimg\" /></p>';




  




		
        $mail->AddAddress($to);
		
		if(!$mail->send()) {
           echo "Mailer Error: " . $mail->ErrorInfo;
          } 
        else {
		header("Location: espacepromotion.php");
		}

  
}
?>
