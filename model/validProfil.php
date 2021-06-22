<!DOCTYPE html>
<!-- ~/php/tp1/model/validProfil.php-->
<html class="responsive" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Stim | Arthur ODIN</title>
		<link rel="icon" href="/images/favicon.ico" type="image/ico">
		<link href="/css/logincss.css" rel="stylesheet" type="text/css">
	</head>
	<Body>
		<?php
			//récupérer les valeurs
			if(isset($_POST['pseudo'])) {$pseudo=htmlspecialchars($_POST['pseudo']);}	else {$pseudo='nobody';}
			if(isset($_POST['email'])) {$email=htmlspecialchars($_POST['email']);}	else {$email='nobody';}
			if(isset($_POST['country'])) {$country=htmlspecialchars($_POST['country']);}	else {$country='nobody';}
			if(isset($_POST['photo'])) {$photo=htmlspecialchars($_POST['photo']);}	else {$photo='nobody';}
			$message="";
			
			// conttrole des modifs
			// Pseudo
			if ($pseudo!=$_SESSION['pseudo'] and $pseudo!='nobody')
			{
				//On regarde si le pseudo existe déjà dans la base
				$compteur=0;
				$larequete = "SELECT idUser FROM users WHERE pseudo = :pseudo";
				$req=$dbh->prepare($larequete);
				$req->execute(array(
					'pseudo' => $pseudo
					));
				while ($donnees = $req->fetch())
					{
						$compteur = $compteur + 1;
					}
				$req->closeCursor();
				if ($compteur>0)
				{
					$message .="Désolé, mais ce pseudo est déjà utilisé.<br><br>";
					$pseudo=$_SESSION['pseudo'];
				}
				else
				{
					$message .="Ce pseudo est disponible. C'est désomais le votre.<br><br>";
					$_SESSION['pseudo']=$pseudo;
				}
			}
			else
			{
				$message .="Votre pseudo reste inchangé.<br><br>";
				$pseudo=$_SESSION['pseudo'];
			}
			// adresse mail
			if ($email!=$_SESSION['mail'] and $email!='nobody')
			{
				//On regarde si l'adresse mail existe déjà dans la base
				$compteur=0;
				$larequete = "SELECT idUser FROM users WHERE login = :login";
				$req=$dbh->prepare($larequete);
				$req->execute(array(
					'login' => $email1
					));
				while ($donnees = $req->fetch())
					{
						$compteur = $compteur + 1;
					}
				$req->closeCursor();
				if ($compteur>0)
				{
					$message .="Désolé, mais cette adresse mail correspond déjà à un compte<br><br>";
					$email=$_SESSION['mail'];		
				}
				else
				{
					$message .="Votre adresse Email est changée.<br><br>";
					$_SESSION['mail']=$email;
				}
			}
			else
			{
				$message .="Votre adresse Email reste inchangé.<br><br>";
				$email=$_SESSION['mail'];
			}
			// Country
			if ($country!=$_SESSION['country'] and $country!='nobody')
			{	
				$message .="Votre pays de résidence est modifié.<br><br>";
				$_SESSION['country']=$country;
			}
			else
			{	
				$message .="Votre pays de résidence reste le même.<br><br>";
				$country=$_SESSION['country'];
			}
			// photo
			if ($photo!=$_SESSION['photo'] and $photo!='nobody')
			{
				$message .="La photo de votre profil change.<br><br>";
				$_SESSION['photo']=$photo;
			}
			else
			{
				$message .="La photo de votre profil reste la même.<br><br>";
				$photo=$_SESSION['photo'];
			}
			
			// c'est pas mal tout ça ! on met à jour la base.
			$req = $dbh->prepare('UPDATE users SET pseudo = :pseudo , login = :login , pays = :country, photo = :photo WHERE idUser = :idUser');
			$req->execute(array(
			'pseudo' => $pseudo,
			'login' => $email,
			'country' => $country,
			'photo' => $photo,
			'idUser' => $_SESSION['idUser']
			)); 
			$req->closeCursor();
		?>
	</Body>
</html>