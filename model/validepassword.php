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
		if(isset($_POST['password1'])) {$password1=htmlspecialchars($_POST['password1']);}	else {$password1='nobody';}
		if(isset($_POST['password2'])) {$password2=htmlspecialchars($_POST['password2']);}	else {$password2='nobody';}
		if(isset($_POST['email']) and strlen(htmlspecialchars($_POST['email']))>6) {$email=htmlspecialchars($_POST['email']);} else {$email='nobody';}
		if(isset($_POST['code']) and strlen(htmlspecialchars($_POST['code']))>6) {$code=htmlspecialchars($_POST['code']);} else {$code='nobody';}
		if(isset($_POST['idUser'])) {$idUser=htmlspecialchars($_POST['idUser']);} else {$idUser='nobody';}
		$message="";
		require_once("mdp.php"); // vérifier la validité du mdp
		if ($message!="")
		{ // il y a une erreur
			echo '<div id="pageinscription">';
				echo '<div class="inscrit">';
					if ($message!="")
					{
						echo "<H2>" . $message . "<br>Merci de recommencer.</H2>";
					}
				echo '</div></BR>';
				echo '<div class="inscrit">';
					if ($message!="" and $email!='')
					{
						echo '<form method="get" action="/view/reinitialisationMdp.php">';
						echo '<input type="hidden" name="adresse" value="' . $email . '"/>';
						echo '<input type="hidden" name="code" value="' . $code . '"/>';
							echo '<button type="submit" class="BtPerso" name="Retour">Retour</button>';
						echo '</form>';
						exit();
					}
					echo '</BR></BR></BR></BR>';
				echo '</div>';
			echo '</div>';
			exit;
		}
		else
		{// c'est bon, on peut modifier le mot de passe
			echo '<H1><CENTER>Changement de mot de passe</CENTER></H1><br><br><br>';
			include (__DIR__ . '/../database/db.php');
			$req = $dbh->prepare('UPDATE users SET password = :password WHERE idUser = :idUser');
			$req->execute(array(
			'password' => sha1($password1),
			'idUser' => $idUser
			)); 
			$req->closeCursor();
			echo '<H3><Center>Le mot de passe a été modifier.</H3></Center>';
		}
	?>
	<!-- Mot de passe changé, on peut aller sur le page de login pour l'essayer -->
	<br /><br /><br /> 
	<form action="/view/login.html">	
		<div class="inscrit">
			<button type="submit" class="BtPerso" name="Retour">Retour</button>
		</div>
	</form>	
</Body>
</html>