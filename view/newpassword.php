<!-- ~/php/tp1/view/newpassword.php -->
<!DOCTYPE html>
<html class="responsive" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Stim | Arthur ODIN</title>
	<link rel="icon" href="/images/favicon.ico" type="image/ico">
	<link href="/css/logincss.css" rel="stylesheet" type="text/css">
</head>
<Body>
	<div class="newuser">
		<form method="post" action="/model/vnewpassword.php">
			<H1>Demandez un nouveau mot de passe</H1>
			</BR></BR>
			<H2>Quel est votre adresse e-mail ? </H2>
			<input type="email" name="email1" id="email1" /></BR>
			<br /><br /><br />
			<div class="inscrit">
				<button type="submit" class="BtPerso" name="envoie">Envoyer</button>
				<button type="submit" class="BtPerso" name="Retour">Retour</button>
			</div>
		</form>	
	</div>
</Body>
</html>