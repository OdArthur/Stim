<?php
// ~/php/tp1/model/games.php

$query = $dbh->prepare('SELECT IdGames, name, Description, price, categorie, Image, download FROM `games` ORDER BY `games`.`IdGames` DESC');
$query->execute();
$games = $query -> fetchAll();

$categories=array();
foreach ($games as $categorie => $categorieId)
{
	if (array_search($categorieId['categorie'],$categories)==False)
	{
		array_push($categories,$categorieId['categorie']);
	}
}
sort($categories);

function createGame($dbh, $game) {
		if(IsGameUnique($dbh, $game)){
			$query = $dbh->prepare('INSERT INTO games (name, Description, price, categorie, download) VALUES (:name, :Description, :price, :categorie, :download)');
			return $query->execute([
				':name' => $game['name'],
				':Description'=> $game['Description'],
				':price' => $game['price'],
				':categorie' => $game['categorie'],
				':download' =>$game['download']
			]);
		}
    }
	
function IsGameUnique($dbh, $game){
	$query = $dbh->prepare('SELECT name, Description, price, categorie, download FROM games');
	$query->execute();
	$AllGames = $query -> FetchAll();
	foreach($AllGames as $TheGame){
		if($TheGame == $game){
			return false;
		}
	}
	return true;
}
	
function GetGames($dbh)
{
	$query = $dbh->prepare('SELECT name, Description, price, categorie, Image FROM `games` ORDER BY `games`.`name` ASC');
	$query->execute();
	return $query -> fetchAll();
}