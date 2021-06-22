<?php
// ~/php/tp1/public/Categorie.php
$categorieID = $_GET["id"];

// include database
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/games.php';

if($categorieID =="" || $categorieID == null){
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
else
{
	// include view
	include(__DIR__ . '/../view/top.html');
	include __DIR__ . '/../view/Categorie.php';
}
