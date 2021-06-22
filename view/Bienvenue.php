<!-- ~/php/tp1/view/Bienvenue.php --><!DOCTYPE html>
<html class="responsive" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Stim | Arthur ODIN</title>
    <link rel="icon" href="/images/favicon.ico" type="image/ico">
    <link href="/css/logincss.css" rel="stylesheet" type="text/css">
</head>
<Body>
    <center><H1>Bienvenue Sur Stim !</H1></center></BR>
    <div class="inscrit">
	<!--Boutton d'ajout jeu-->
		<form action="/public/createGame.php">
            <button type="submit" class="BtPerso">Ajouter un jeu</button>
        </form>
	<!--Boutton mes jeux-->
		<form action="/public/MyGames.php">
            <button type="submit" class="BtPerso" >Mes jeux</button>
        </form>
    <!--Boutton de déconnexion-->
        <form action="/view/login.html">
            <button type="submit" class="BtPerso" name="Retour">Déconnexion</button>
        </form>
        
    </div>
    </BR></BR></BR></BR>
    
    
     <form action="/public/searchCategorie.php" method="post">
         <p>Rechercher une catégorie: </p>
         <input type="text" placeholder="Nom de la catégorie" name="search">
     </form>
    
    <h1>Catégories</h1>
    
    <!--Affichage des catégories-->
         <table class="Categoriestab">
        <tr>
        <?php 
        foreach ($categories as $Categorie => $CategorieId) 
        { ?>
            <td style="padding-left: 5px; padding-right: 5 px;">
                <table>
                    <tr>
                        <td>
                            <a href="/public/Categorie.php?id=<?=$CategorieId; ?>">
                                <?= $CategorieId; ?>
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        <?php } ?>
        </tr>
    </table>
    
    
    <!--Entrée de recherche de jeu-->
     <form action="/public/searchGames.php" method="post">
         <p>Rechercher un jeu: </p>
         <input type="text" placeholder="Nom du jeu" name="search">
     </form>
    
    <h1>Nouveaux jeux</h1>
    
    <!-- Affichage des nouveaux jeux en colonnes -->
	<?php $finTab=0; ?>
    <table class="NewGamestab">
        <tr>
            <?php foreach ($games as $gameId => $game) : ?>
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
                            <td><?= $game['Image']; ?></td>
                        </tr>
                        <tr>
                            <td><?= $game['price']; ?> € </td>
                        </tr>
                    </table>
                </td>
				<?php 
				$finTab ++;
				if ($finTab>9){break 1;} /* s'arrete au 10eme */
            endforeach; ?>
        </tr>
    </table>
</Body>
</html>