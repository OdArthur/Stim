<?php
// ~/php/tp1/public/game.php
$gameID = htmlspecialchars($_GET["id"]);

// include database
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/games.php';

if($gameID > $games[0]['IdGames'] || $gameID == null || $gameID <= 0){
	/**
	 * render a 404 page
	 */
	function page_not_found()
	{
	 header("HTTP/1.0 404 Not Found"); //On définit la page comme étant une page 404 au sein de l’entête
	 include __DIR__ . '/../view/404.html'; // On ajoute la vue de la page 404
	 die(); // arrête l’exécution du script
	}
	page_not_found();
}	
else{
	
	$query = $dbh->prepare('SELECT g.IdGames, g.name, g.Description, g.categorie, g.price, g.download FROM games g WHERE g.IdGames LIKE :GameID');
	$query->execute([':GameID' => $gameID]);
	$game = $query -> fetchAll();
	$game = $game[0];
	// include view
	include(__DIR__ . '/../view/top.html');
	include __DIR__ . '/../view/game.php';
}
