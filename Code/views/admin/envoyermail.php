<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 31/03/2019
 * Time: 20:11
 */
include "../../entities/promotion.php";
include "../../core/promotionC.php";

require_once '../../lib/phpmailer/PHPMailerAutoLoad.php';
if (isset($_POST['envoyer'])){
  $to=$_POST['destination'] ;

  $sujet="Nouvel evenement!!!!";
$delim=md5(uniqid(rand()));

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

      
$mail->AddEmbeddedImage('img/' . $_POST['image'], 'logoimg'); // attach file logo.jpg, and later link to it using identfier logoimg

$mail->Body = '<h1>'.$_POST['description'].'</h1>
    <p> <img src=\"cid:logoimg\" /></p>';


      $mail->AddAddress($to);
		
		if(!$mail->send()) {
           echo "Mailer Error: " . $mail->ErrorInfo;
          } 
        else {
		header("Location: espacevenement.php");
		}

  
 

}