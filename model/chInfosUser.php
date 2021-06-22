<?php
	// ~/php/tp1/model/chInfosUser.php
	// on récupère les infos si existe

	require_once (__DIR__ . '/../database/db.php');
	$larequete = "SELECT * FROM users WHERE login = :login or pseudo = :login";
	$req=$dbh->prepare($larequete);

	$req->execute(array(
		'login' => $email
		));
	while ($donnees = $req->fetch())
		{
			$idUser = $donnees['idUser'];
			$pseudo = $donnees['pseudo'];
			$mail = $donnees['login'];
			$oldpassword = $donnees['password'];
			$country = $donnees['pays'];
			$DateInscription = $donnees['inscription'];
			$photo = $donnees['photo'];
		}
	$req->closeCursor();
?>