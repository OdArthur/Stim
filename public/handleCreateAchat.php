<?php
 // ~/php/tp1/public/handleCreateAchat.php
// include db
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/Achat.php';

//include Session
include __DIR__ . '/../view/top.html';

    $Achat = [
        'IdUser_Achat' => htmlspecialchars($_SESSION['idUser']),
        'IdGame_Achat' => htmlspecialchars($_POST['IdGame'])
    ];
    $result = createAchat($dbh, $Achat);
	
	header("Location: " .htmlspecialchars($_POST['download']) ."");
	
?>
