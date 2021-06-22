<?php
// ~/php/tp1/public/searchGames.php

// include database
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/games.php';

$search = htmlspecialchars($_POST['search']);

$query = $dbh->prepare('SELECT g.IdGames, g.name, g.Description, g.categorie, g.price FROM games g WHERE g.name LIKE :search ORDER BY g.name');
$query->execute([':search' => '%' . $search .  '%']);
$SRCH = $query -> fetchAll();

//Include du bandeau en haut de la page
//(qui vérifie si la personne est bien connecté par la même occasion)
include(__DIR__ . '/../view/top.html');
// include view
include __DIR__ . '/../view/searchGames.php';
