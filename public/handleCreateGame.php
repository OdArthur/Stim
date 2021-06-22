<?php
 // ~/php/tp1/public/handleCreateGame.php
 
	 //retour ?
	if(isset($_POST['retour']))
	{
		header('Location: /public/main.php');
		exit();
	}
 
// include db
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/games.php';

//include Session
include __DIR__ . '/../view/top.html';

    $game = [
        'name' => htmlspecialchars($_POST['name']),
        'categorie' => htmlspecialchars($_POST['categorie']),
		'Description' => htmlspecialchars($_POST['Description']),
		'price' => htmlspecialchars($_POST['prix']),
		'download' => htmlspecialchars($_POST['download'])
    ];
    $result = createGame($dbh, $game);
	
	header('Location: /public/main.php');
	
//$cities = GetCities($dbh);

