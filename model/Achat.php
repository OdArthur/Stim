<?php
// ~/php/tp1/model/Achat.php

$query = $dbh->prepare('SELECT IdUser_Achat, IdGame_Achat FROM `achat`');
$query->execute();
$achats = $query -> fetchAll();

function createAchat($dbh, $Achat) {
		if(IsUnique($dbh, $Achat)){
        $query = $dbh->prepare('INSERT INTO achat (IdUser_Achat, IdGame_Achat) VALUES (:IdUser_Achat, :IdGame_Achat)');
        return $query->execute([
			':IdUser_Achat' => $Achat['IdUser_Achat'],
			':IdGame_Achat' => $Achat['IdGame_Achat']
        ]);
		}
		//return $query;
    }
	
function IsUnique($dbh, $Achat)
{
	$query = $dbh->prepare('SELECT IdUser_Achat, IdGame_Achat FROM `achat` WHERE IdUser_Achat LIKE :IdUser ');
	$query->execute([':IdUser' => $Achat['IdUser_Achat']]);
	$Unique = $query -> fetchAll();
	foreach($Unique as $UniqueId){
		if($UniqueId['IdGame_Achat'] == $Achat['IdGame_Achat']){
			return false;
		}
	}
	return true;
}
