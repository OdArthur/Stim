<!-- ~/php/tp1/view/createGame.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stim | Arthur ODIN</title>
        <link rel="icon" href="/images/favicon.ico" type="image/ico">
        <link href="/css/logincss.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<div id="form-outer">
			<h1 style="text-align: center;">Ajouter un Jeux</h1>
			<div id="CreateGamePage">
				<form action="/public/handleCreateGame.php" method="POST">
					<div>
						<div class="labels">
							<label>Nom du jeu :</label>
						</div>
						<input class="right" type="text" name="name" placeholder="Nom du jeu" required>
					</div>
					<div>
						<div class="labels">
							<label>Categorie :</label>
						</div>
						<input class="right" type="text" name="categorie" placeholder="La categorie du jeu" required>
					</div>
					<div>
						<div class="labels">
							<label>Description :</label>
						</div>
						<input class="right" type="text" name="Description" placeholder="La description du jeu" required>
					</div>
					<div>
						<div class="labels">
							<label>Prix :</label>
						</div>
						<input class="right" type="number" name="prix" placeholder="Le prix du jeu en € en nombre" min="0" step=".01" required>
					</div>
					<div>
						<div class="labels">
							<label>Lien de Téléchargement(ou page) :</label>
						</div>
						<input class="right" type="text" name="download" placeholder="Lien de téléchargement." required>
					</div>
					</br></br>
					<div class="inscrit">
						<button class="BtPerso" name="creer" type="submit">Créer</button>
						<button class="BtPerso" name="Retour" type="submit">Retour</button>
					</div>
				</form>
			</div>	
        </div>
    </body>
</html>