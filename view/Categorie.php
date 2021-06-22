<!-- ~/php/tp1/view/Categorie.php -->
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Stim | Arthur ODIN</title>
		<link rel="icon" href="/images/favicon.ico" type="image/ico">
		<link href="/css/logincss.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1><?php echo $categorieID; ?></h1>
		<?php foreach ($games as $gameId => $game) { ?>
			<?php
				if ($game['categorie']==$categorieID)
				{	?>
					<a href="/public/game.php?id=<?= $game['IdGames']; ?>">	
						<?= $game['name']; ?>
					</a>
					<BR/>------------------------<BR/>
				<?php }
			}?>
		<BR/>
		
		<div class="inscrit">
			<form action="/public/main.php">
				<br />
				<button type="submit" class="BtPerso" name="Retour">Retour</button>
			</form>
		</div>
		
	</body>
</html>