<!-- ~/php/tp1/view/searchGames.php -->
<!DOCTYPE HTML>
<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Stim | Arthur ODIN</title>
	<link rel="icon" href="/images/favicon.ico" type="image/ico">
	<link href="/css/logincss.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 <h1>Résultat de la recherche :</h1>
	<table>
		<?php foreach ($SRCH as $gameID=> $game) : ?>
		<tr>
			<td style="padding-right: 20px;">
				<a href="/public/game.php?id=<?= $game['IdGames']; ?>" class="cut-text">
					<?= $game['name']; ?>
				</a>
			</td>
			<td style="padding-right: 20px;"><?= $game['categorie']; ?></td>
			<td><?= $game['price']; ?> €</td>
		</tr>
		<?php endforeach; ?>
	</table>
	
		<div class="inscrit">
			<form action="/public/main.php">
				<br />
				<button type="submit" class="BtPerso" name="Retour">Retour</button>
			</form>
		</div>
	
</body>
</html>