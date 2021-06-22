<!-- ~/php/tp1/view/game.php -->
<!DOCTYPE HTML>
<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Stim | <?php echo $game['name']; ?> | Arthur ODIN</title>
	<link rel="icon" href="/images/favicon.ico" type="image/ico">
	<link href="/css/logincss.css" rel="stylesheet" type="text/css">
 </head>
 <body>
	 <h1><?php echo $game['name']; ?></h1>
		<p><strong>Categorie : </strong><?php echo $game["categorie"] ?></p>
		<p><strong>À propos du jeu : </strong><?php echo $game['Description']; ?></p>
		<p><strong>Prix : </strong><?php echo $game['price'] ?> €</p>
		
		<div class="inscrit">
			<form action="/public/handleCreateAchat.php" method="post">
				<br />
				<input type="hidden" name="IdGame" value="<?php echo $game['IdGames']; ?>">
				<input type="hidden" name="download" value="<?php echo $game['download']; ?>">
				<button type="submit" class="BtPerso" name="Acheter">Acheter</button>
			</form>
		</div>
		
		<p style="text-align: center;">En appuyant sur le boutton Acheter vous obtiendrez le jeu.<p>
		
		<div class="inscrit">
			<form action="/public/main.php">
				<br />
				<button type="submit" class="BtPerso" name="Retour">Retour</button>
			</form>
		</div>
 </body>
</html>