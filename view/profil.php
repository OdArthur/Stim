<!-- ~/php/tp1/view/profil.php -->
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Stim - Arthur ODIN</title>
		<link rel="icon" href="/images/favicon.png" type="image/png">
		<link rel="stylesheet" href="/css/profil.css" />
	</head>
	<body>
		<div id="form-outer">
			<h1>Mon profil</h1>
			<p id="description">
				Modifier votre profil en remplaçant les informations présentes
			</p>
			<form method="post" action="/public/validProfil.php">
				<div>
					<div class="labels">
						<label>* Pseudo : </label>
					</div>
					<input class="right" type="text" name ="pseudo" id="pseudo" placeholder="Votre pseudo" value="<?php echo $_SESSION['pseudo']; ?>" required>
				</div>
				<div>
					<div class="labels">
						<label>Inscrit le : </label>
					</div>
					<input class="right" type="text" placeholder="Date d'inscription" value="<?php echo strftime('%d-%m-%Y',strtotime($_SESSION['inscription'])); ?>" readonly="readonly">
				</div>
				<div>
					<div class="labels">
						<label>* Adresse mail : </label>
					</div>
					<input class="right" type="email" name ="email" id="email" placeholder="Votre adresse mail" value="<?php echo $_SESSION['mail']; ?>" required>
				</div>
				<div>
					<div class="labels"> Pays de résidence : </div>
					<select class="right" name ="country" id="country">
						<option value="France" <?php if ($_SESSION['country']=="France"){echo "Selected ";}?>>France</option>
						<option value="Espagne" <?php if ($_SESSION['country']=="Espagne"){echo "Selected ";}?>>Espagne</option>
						<option value="Italie" <?php if ($_SESSION['country']=="Italie"){echo "Selected ";}?>>Italie</option>
						<option value="Royaume-uni" <?php if ($_SESSION['country']=="Royaume-uni"){echo "Selected ";}?>>Royaume-Uni</option>
						<option value="Canada" <?php if ($_SESSION['country']=="Canada"){echo "Selected ";}?>>Canada</option>
						<option value="Etats-unis" <?php if ($_SESSION['country']=="Etats-unis"){echo "Selected ";}?>>États-Unis</option>
						<option value="Chine" <?php if ($_SESSION['country']=="Chine"){echo "Selected ";}?>>Chine</option>
						<option value="Japon" <?php if ($_SESSION['country']=="Japon"){echo "Selected ";}?>>Japon</option>
					</select>
				</div>
				<div>
					<div class="middle top-space">
						<label >Mon image de profil</labels>
					</div>
					<div class="radio-toolbar middle">
						<div>
							<input id="check1" class="labels" type="radio" name="photo" value="p01.png" <?php if($_SESSION['photo']=="p01.png") echo"checked"; ?>>
							<label for="check1">
								<img id="Onimage" class="right" src="/images/p01.png">
							</label>
						</div>
						<div>
							<input id="check2" class="labels" type="radio" name="photo" value="p02.png"  <?php if($_SESSION['photo']=="p02.png") echo"checked"; ?>>
							<label for="check2">
								<img id="Onimage" class="right" src="/images/p02.png">
							</label>
						</div>
						<div>
							<input id="check3" class="labels" type="radio" name="photo" value="p03.png"  <?php if($_SESSION['photo']=="p03.png") echo"checked"; ?>>
							<label for="check3">
								<img id="Onimage" class="right" src="/images/p03.png">
							</label>
						</div>
						<div>
							<input id="check4" class="labels" type="radio" name="photo" value="p04.png"  <?php if($_SESSION['photo']=="p04.png") echo"checked"; ?>>
							<label for="check4">
								<img id="Onimage" class="right" src="/images/p04.png">
							</label>
						</div>
						<div>
							<input id="check5" class="labels" type="radio" name="photo" value="p05.png"  <?php if($_SESSION['photo']=="p05.png") echo"checked"; ?>>
							<label for="check5">
								<img id="Onimage" class="right" src="/images/p05.png">
							</label>
						</div>
						<div>
							<input id="check6" class="labels" type="radio" name="photo" value="p06.png"  <?php if($_SESSION['photo']=="p06.png") echo"checked"; ?>>
							<label for="check6">
								<img id="Onimage" class="right" src="/images/p06.png">
							</label>
						</div>
					</div>
				</div>
				</BR>
				<button type="submit" class="BtPerso" name="envoyer">Envoyer</button>
			</form>
		</div>
	</body>
</html>


