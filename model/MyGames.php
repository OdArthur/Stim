<?php
// ~/php/tp1/model/MyGames.php

	$query = $dbh->prepare('SELECT a.IdAchat, a.IdUser_Achat, a.IdGame_Achat, g.IdGames, g.name, g.price, g.categorie
							FROM achat AS a
							INNER JOIN games AS g ON g.IdGames = a.IdGame_Achat
							WHERE a.IdUser_Achat = :IdUser
							ORDER BY a.IdAchat ASC');
	$query->execute([':IdUser' => $_SESSION['idUser']]);
	$myGames = $query -> fetchAll();

?>