<!-- ~/php/tp1/view/oldmain.php -->
<!DOCTYPE HTML>
<html>
 <head>
 <meta http-equiv="content-type" content="text/html;
charset=utf-8" />
 <title>Stim</title>
 <link rel="stylesheet" href="mainstyle.css" />
 </head>
 <body>
 
 	<table>
		<?php 
		foreach ($categories as $Categorie => $CategorieId) 
		{ ?>
			<tr>
				<td>
					<a href="/Categorie.php?id=<?=$CategorieId; ?>">
						<?= $CategorieId; ?>
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
 
 <form action="/search.php" method="post">
	 <p>Search in games: </p>
	 <input type="text" placeholder="Game name" name="search">
 </form>
 
 <h1>New Games</h1>
	<table>
	<tr class="col">
		<?php foreach ($games as $gameId => $game) : ?>
		<td>
		<tr>
			<td>
			<div class = "cut-text">
				<a href="/city.php?id=<?= $gameId; ?>" class="cut-text">
					<?= $game['name']; ?>
				</a>
			</div>
			</td>
		</tr>
		<tr>
			<td><?= $game['Image']; ?></td>
		</tr>
		<tr>
			<td><?= $game['price']; ?> € </td>
		</tr>
		</td>
		<?php endforeach; ?>
	</tr>
	</table>
	
<h1>All Categories</h1>
	<table>
		<?php 
		foreach ($categories as $Categorie => $CategorieId) 
		{ ?>
			<tr>
				<td>
					<a href="/country.php?id=<?=$CategorieId; ?>">
						<?= $CategorieId; ?>
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	
	<p>
        <a href="/create.php">Publish a new Game</a>
    </p>
 </body>
</html>