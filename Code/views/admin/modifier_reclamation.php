<?php
require '../../core/reclamationC.php';
require_once '../../lib/phpmailer/PHPMailerAutoload.php';

$id=$_GET['id'];
$ec= new reclamationC();
$ec->modifier_Reclamation($id);
$result=$ec->getMailReclamtion($id);
        $email=$result->email;
   $mail = new PHPMailer();
  $mail->Host = "smtp.gmail.com";
 // $mail->SMTPDebug = 3;
  $mail->IsSMTP();
try {  

     
  //$mail->Host = "smtp.gmail.com";
echo !extension_loaded('openssl')?"Not Available":"Available";

  $mail->SMTPAuth = true;
  $mail->Username = "eyezone.manarcity@gmail.com";
  $mail->Password = "eyezone123456";

  $mail->SMTPSecure = "ssl"; 
  $mail->Port = 465; 
  $mail->Subject = "Reclamtion";
  $mail->isHTML(true);
   //$mail->AddAttachment($file_name);  
  $mail->setFrom('eyezone.manarcity@gmail.com','eye zone');
  $body = "votre réclamation a ete prise en charge nous allons vous contactez tres bientot";
  $mail->Body=$body;
  $mail->addAddress($email);
  $mail->send();
  // header('Location: listedescommandes.php');

} catch (phpmailerException $e) {
  //you can either report the errors here or redirect them to an error page
  //using the above META tag
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
  //Verify the temporary pdf file got deleted
 // unlink($file);}}/*
   if(!$mail->send()) {
           echo "Mailer Error: " . $mail->ErrorInfo;
          } 
          else {
           echo "Message has been sent successfully";
          }


header('Location: serviceapresvente.php');  
?>