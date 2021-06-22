<!DOCTYPE html>
<html class="responsive" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Stim | Arthur ODIN</title>
	<link rel="icon" href="/images/favicon.ico" type="image/ico">
	<link href="/css/logincss.css" rel="stylesheet" type="text/css">
</head>
<Body>
	<?php require_once(__DIR__ . '/../view/btRetour.php'); ?>
	<div class="inscrit">
		<H1>CRÉEZ VOTRE COMPTE</H1>
	</div>
	</BR></BR>
	<?php		
		//récupérer les valeurs
		if(isset($_POST['pseudo']) and strlen(htmlspecialchars($_POST['pseudo']))>=1) {$pseudo=htmlspecialchars($_POST['pseudo']);} else {$pseudo='nobody';}
		if(isset($_POST['email1'])) {$email1=htmlspecialchars($_POST['email1']);} else {$email1='nobody';}
		if(isset($_POST['email2'])) {$email2=htmlspecialchars($_POST['email2']);}	else {$email2='nobody';}
		if(isset($_POST['password1'])) {$password1=htmlspecialchars($_POST['password1']);}	else {$password1='nobody';}
		if(isset($_POST['password2'])) {$password2=htmlspecialchars($_POST['password2']);}	else {$password2='nobody';}
		if(isset($_POST['country'])) {$country=htmlspecialchars($_POST['country']);}	else {$country='nobody';}
		if(isset($_POST['accepte'])) {$accepte=1;}	else {$accepte=0;}
		//retour ?
		if(isset($_POST['retour']))	
		{
			header('Location: /view/login.html');
			exit();
		}
		// s'il manque une info, ou emails / password non confirmé, ou longeur password incorrecte
		$message="";
		if ($accepte==0)
		{
			$message="Vous devez accepter les conditions d'utilisation.";
		}
		if ($country=='nobody')
		{
			$message="Le pays n'est pas correcte.";
			$country="";
		}
		if ($pseudo=='nobody')
		{
			$message="Le pseudo n'est pas correcte.";
			$pseudo="";
		}
		require_once('mdp.php');
		if ($email1=='nobody' or $email2=='nobody' or $email1!=$email2 or strlen($email1)<6 or strlen($email2)<6)
		{
			$message="L'adresse mail n'est pas correcte.";
			$email1='';
			$email2='';
		}
		if ($message!="")
		{
			echo '<div id="pageinscription">';
				echo '<div class="newuser">';
					echo "<H2>" . $message . "<br>Merci de recommencer.</H2>";
					echo '</BR>';
					echo '<form method="post" action="/view/inscription.php"><br />';
						echo '<input type="hidden" name="pseudo" value="' . $pseudo . '"/>';
						echo '<input type="hidden" name="email1" value="' . $email1 . '"/>';
						echo '<input type="hidden" name="email2" value="' . $email2 . '"/>';
						echo '<input type="hidden" name="password1" value="' . $password1 . '"/>';
						echo '<input type="hidden" name="password2" value="' . $password2 . '"/>';
						echo '<input type="hidden" name="country" value="' . $country . '"/>';
						echo '<button type="submit" class="BtPerso" name="Retour">Retour</button>';
					echo '</form>';
					exit();
					echo '</BR></BR></BR></BR>';
				echo '</div>';
			echo '</div>';
		}
		//On regarde si l'adresse mail existe déjà dans la base
		require_once(__DIR__ . '/../database/db.php');
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
			echo '<div id="pageinscription">';
				echo '<div class="newuser">';
					echo "<H2>Désolé, mais cette adresse mail correspond déjà à un compte<br>Merci de recommencer.</H2>";
					echo '</BR>';
					echo '<form method="post" action="/view/inscription.php"><br />';
						echo '<input type="hidden" name="pseudo" value="' . $pseudo . '"/>';
						echo '<input type="hidden" name="password1" value="' . $password1 . '"/>';
						echo '<input type="hidden" name="password2" value="' . $password2 . '"/>';
						echo '<input type="hidden" name="country" value="' . $country . '"/>';
						echo '<button type="submit" class="BtPerso" name="Retour">Retour</button>';
					echo '</form>';
					exit();
					echo '</BR></BR></BR></BR>';
				echo '</div>';
			echo '</div>';
		}
		//On regarde si le pseudo existe déjà dans la base
		require_once (__DIR__ . '/../database/db.php');
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
			echo '<div id="pageinscription">';
				echo '<div class="newuser">';
					echo "<H2>Désolé, mais ce pseudo est déjà utilisé.<br>Merci de recommencer.</H2>";
					echo '</BR>';
					echo '<form method="post" action="/view/inscription.php"><br />';
						echo '<input type="hidden" name="email1" value="' . $email1 . '"/>';
						echo '<input type="hidden" name="email2" value="' . $email2 . '"/>';
						echo '<input type="hidden" name="password1" value="' . $password1 . '"/>';
						echo '<input type="hidden" name="password2" value="' . $password2 . '"/>';
						echo '<input type="hidden" name="country" value="' . $country . '"/>';
						echo '<button type="submit" class="BtPerso" name="Retour">Retour</button>';
					echo '</form>';
					exit();
					echo '</BR></BR></BR></BR>';
				echo '</div>';
			echo '</div>';
		}
		// L'adresse n'existe pas, on l'ajoute à la liste des utilisateurs
		$larequete = "INSERT INTO users (login, pseudo, password, pays, inscription) VALUES(:email, :pseudo, :mdp, :pays, :date)";
		$req=$dbh->prepare($larequete);
		$req->execute(array(
			'email' => $email1,
			'pseudo' => $pseudo,
			'mdp' => sha1($password1),
			'pays' => $country,
			'date' => date("Y-m-d")
			));
		$req->closeCursor(); 
	?>
	<div class="inscrit">
		<H2>Votre compte a été créé. Vous pouvez vous connecter dès maintenant.</H2>
	</div>
	<div class="inscrit">
		<form action="/view/login.html">
			<br />
			<button type="submit" class="BtPerso" name="Retour">Connexion</button>
		</form>
	</div>
	</BR></BR></BR></BR>
</Body>
</html>