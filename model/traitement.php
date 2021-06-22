<!DOCTYPE html>
<html class="responsive" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Stim | Arthur ODIN</title>
		<link rel="icon" href="/images/favicon.ico" type="image/ico">
		<link href="/css/logincss.css" rel="stylesheet" type="text/css">
	</head>
	<Body>
		<?php
			require_once(__DIR__ . '/../view/btRetour.php');
			//récupérer les valeurs
			if(isset($_POST['user'])) {$email=htmlspecialchars($_POST['user']);}	else {$email='nobody';}
			if(isset($_POST['password'])) {$password=htmlspecialchars($_POST['password']);}	else {$password='nobody';}
			if ($email!='nobody' and $password!='nobody')
			{	
				require("chInfosUser.php");
				if (isset($idUser) and sha1($password)==$oldpassword) // utilisateur trouvé , code bon ?
				{
					session_start();
					$_SESSION['idUser']= $idUser;
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['password'] = $oldpassword;
					$_SESSION['mail']= $mail;
					$_SESSION['country']=$country;
					$_SESSION['inscription']=$DateInscription;
					$_SESSION['photo']=$photo;
					header('Location: /public/main.php');
					exit;
				}
				else // utilisateur non trouvé ou code faut
				{
					btRetour("Identifiant ou mot de passe incorrecte.", "/view/login.html");
				}

			}
			else
			{
				btRetour("Il manque des informations de connexion.", "/view/login.html");
			}
		?>
	</Body>
</html>