<?php
	// ~/php/tp1/model/mdp.php
	if ($password1=='nobody' or $password2=='nobody' or $password1!=$password2)
	{
		$message="Le mot de passe n'est pas correcte.";
		$password1="";
		$password2="";
	}
	else
	{
		// validité du mot de passe
		$compt = 0;
		// le mot de passe comporte une minuscule ?
		if (preg_match("#[a-z]+#", $password1))
		{
			$compt++;
		}
		// le mot de passe comporte une majuscule ?
		if (preg_match("#[A-Z]+#", $password1))
		{
			$compt++;
		}
		// le mot de passe comporte un chiffre ?
		if (preg_match("#[0-9]+#", $password1))
		{
			$compt++;	
		}
		if ($compt <= 1)
		{
			$message="Le mot de passe ne rempli pas les critères de complexité.";
		}
	}
	if (strlen($password1)<6 or strlen($password1)>25)
	{
		$message="La longueur du mot de passe n'est pas correcte.";
	}
?>