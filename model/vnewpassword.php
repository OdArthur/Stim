<!DOCTYPE html>
<!-- ~/php/tp1/model/vnewpassword.php-->
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
			if(isset($_POST['email1']) and strlen(htmlspecialchars($_POST['email1']))>6) {$email=htmlspecialchars($_POST['email1']);} else {$email='nobody';}
			//retour ?
			if(isset($_POST['Retour']))	
			{
				header('Location: /view/login.html');
				exit();
			}
			if ($email!='nobody' )
			{	
				// on vérifie si existe
				require_once (__DIR__ . '/../database/db.php');
				$larequete = "SELECT idUser FROM users WHERE login = :login";
				$req=$dbh->prepare($larequete);
				$req->execute(array(
					'login' => $email
					));
				while ($donnees = $req->fetch())
					{
						$idUser = $donnees['idUser'];
					}
				$req->closeCursor();
				if (isset($idUser))
				{ // utilisateur trouvé, on lui envoie un mail avec un nouveau code de 10 caractères
					require_once ("emailNewMdpUtilisateur.php");
					//on met a jout le mot de passe pour qu'il soit utilisable
					include (__DIR__ . '/../database/db.php');
					$req = $dbh->prepare('UPDATE users SET password = :password WHERE idUser = :idUser');
					$req->execute(array(
					'password' => sha1($code),
					'idUser' => $idUser
					)); 
					$req->closeCursor();
				}
				else
				{ // utilisateur non trouvé
					btRetour("L'adresse mail, n'a pas été trouvée.", "/view/newpassword.php");
				exit;
				}
			}
			else
			{ // pas d'adresse mail indiqué
				btRetour("Il faut une adresse mail valide.", "/view/newpassword.php");
				exit;
			}
		?>
		<br /><br /><br />
		<form action="/view/login.html">	
			<div class="inscrit">
				<button type="submit" class="BtPerso" name="Retour">Retour</button>
			</div>
		</form>	
	</Body>
</html>