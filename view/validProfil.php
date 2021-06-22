<!-- ~/php/tp1/view/validProfil.php -->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Stim - Arthur ODIN</title>
		<link rel="icon" href="/images/favicon.png" type="image/png">
		<link rel="stylesheet" href="/css/profil.css" />
	</head>
	<body>
		<div id="form-outer">
			<h1>Mon profil</h1>
			<p id="description">
				<br>
				Modification de votre profil :
				<BR><BR>
				<?php
					echo $message;
				?>
			</p>
			<div class="inscrit">
				<form action="main.php"><br />
					<button type="submit" class="BtPerso" name="Retour">Retour</button>
				</form>
				</BR></BR></BR></BR>
			</div>
		</div>
	</Body>
</html>