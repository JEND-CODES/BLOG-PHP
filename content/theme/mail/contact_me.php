<?php

// Vérification des champs vides
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Informations manquantes";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Créez l'e-mail et envoyez le message
$to = 'jeaneudes.nd@gmail.com'; // Ajoutez votre adresse e-mail entre '' en remplaçant votrenom@votredomaine.com - C'est là que le formulaire enverra un message.
$email_subject = "Formulaire de contact du Blog:  $name";
$email_body = "Vous avez reçu un nouveau message depuis le formulaire de contact de votre site Web.\n\n"."Voici les détails:\n\nNom: $name\n\nEmail: $email_address\n\nTelephone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@blogphp.planetcode.fr\n"; // Il s'agit de l'adresse e-mail à partir de laquelle le message sera généré. Nous vous recommandons d'utiliser quelque chose comme noreply@yourdomain.com.
$headers .= "Répondre à: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
