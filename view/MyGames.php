<!-- ~/php/tp1/view/MyGames.php -->
<!DOCTYPE html>
<html class="responsive" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Stim | Arthur ODIN</title>
    <link rel="icon" href="/images/favicon.ico" type="image/ico">
    <link href="/css/logincss.css" rel="stylesheet" type="text/css">
</head>
<Body>
    <center><H1>Mes Jeux :</H1></center></BR>
    
    <!-- Affichage des jeux de l'utilisateur en colonnes avec un ascensceur vertical -->
    <table class="NewGamestab">
        <tr>
            <?php foreach ($myGames as $gameId => $game) : ?>
                <td style="padding-left: 5px; padding-right: 5 px;">
                    <table>
                        <tr>
                            <td>
                            <div class = "cut-text">
                                <a href="/public/game.php?id=<?= $game['IdGames']; ?>" class="cut-text">
                                    <?= $game['name']; ?>
                                </a>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $game['price']; ?> € </td>
                        </tr>
                    </table>
                </td>
			<?php endforeach; ?>
        </tr>
    </table>
	
	<div style="display: flex; margin-top: 50px; justify-content: center;">
		<form action="/public/main.php">
            <button type="submit" class="BtPerso" name="Retour">Retour</button>
        </form>
	</div>
	
</Body>
</html>