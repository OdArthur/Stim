                               
<?php
	// ~/php/tp1/model/emailNewMdpUtilisateur.php
	require_once("aleatoire.php");
	$code = genererChaineAleatoire(10);
    $message = "Bonjour.  \n \nVous avez demandé un changement de mot de passe sur Stim.  \nCliquez sur le lien ci-dessous pour définir votre nouveau mot de passe : \n  \n http://localhost:8000/view/reinitialisationMdp.php?adresse=".$email."&code=".$code;
	$message = utf8_decode($message);
	$headers ='From: NoReply@Stim.Com'."\n";
	
	$success = mail($email, '- Stim - Changement de mot de passe -', $message, $headers ) ; 
	if (!$success) 
	{
		echo "<center><BR><H2>Une erreur c'est produite lors de l'envoie du message.</H2><BR></center>";
		$errorMessage = error_get_last()['message'];
		echo $errorMessage;
	}
	else
	{
		echo "<center><BR><H2>Un message vous a été envoyé avec succès ! Il contient un lien permettant de definir un nouveau mot de passe.</H2><BR></center>";
	}
?>

