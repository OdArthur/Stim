<!-- ~/php/tp1/view/inscription.php -->
<!DOCTYPE html>
<html class="responsive" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Stim | Arthur ODIN</title>
	<link rel="icon" href="/images/favicon.ico" type="image/ico">
	<link href="/css/logincss.css" rel="stylesheet" type="text/css">
</head>
<script>
	function showMsg() {
		alert("<?php echo 'Votre mot de passe doit être composé de 6 à 25 caractères parmis 2 types différent (majuscules, minuscules ou chiffres).' ; ?>");
	}
</script>
<Body>
	<?php		
		//récupérer les valeurs
		if(isset($_POST['pseudo']) and strlen(htmlspecialchars($_POST['pseudo']))>=1) {$pseudo=htmlspecialchars($_POST['pseudo']);} else {$pseudo='';}
		if(isset($_POST['email1'])) {$email1=htmlspecialchars($_POST['email1']);} else {$email1='';}
		if(isset($_POST['email2'])) {$email2=htmlspecialchars($_POST['email2']);}	else {$email2='';}
		if(isset($_POST['password1'])) {$password1=htmlspecialchars($_POST['password1']);}	else {$password1='';}
		if(isset($_POST['password2'])) {$password2=htmlspecialchars($_POST['password2']);}	else {$password2='';}
		if(isset($_POST['country'])) {$country=htmlspecialchars($_POST['country']);}	else {$country='';}
		if(isset($_POST['accepte'])) {$accepte=1;}	else {$accepte=0;}
	?>
	<form method="post" action="/model/valideInscription.php">
		<div class="newuser">
			<H1>CRÉEZ VOTRE COMPTE</H1>
		</div>
		<div class="newuser">
			</BR></BR>
			<label>Choisissez votre pseudo : </label>

			<input type="text" name="pseudo" id="pseudo" maxlength="30" value="<?php echo $pseudo; ?>" />
			</BR></BR></BR>
			<label>Indiquez votre adresse e-mail : </label>
			<input type="email" name="email1" id="email1" value="<?php echo $email1; ?>" /></BR>
			<label>Confirmez votre adresse e-mail : </label>
			<input type="email" name="email2" id="email2" value="<?php echo $email2; ?>" />
			</BR></BR></BR>
			<label>Choisissez votre mot de passe : </label>
			<input type="password" name="password1" id="password1" size="30" maxlength="20" value="<?php echo $password1; ?>" />
			<input name="submit" id="submitme" type="image" src="/images/aide.png" alt="Aide" onClick="javascript: showMsg(); " style="width: 45px;height:auto" /></BR>
			<label>Confirmez votre mot de passe : </label>
			<input type="password" name="password2" id="password2" size="30" maxlength="20" value="<?php echo $password2; ?>" />
			</BR></BR></BR>
		   <label for="country">Pays de résidence : </label>
		   <select name="country" id="country">
			   <option value="France" <?php if ($country=="France"){echo "Selected ";}?>>France</option>
			   <option value="Espagne" <?php if ($country=="Espagne"){echo "Selected ";}?>>Espagne</option>
			   <option value="Italie" <?php if ($country=="Italie"){echo "Selected ";}?>>Italie</option>
			   <option value="Royaume-uni" <?php if ($country=="Royaume-uni"){echo "Selected ";}?>>Royaume-Uni</option>
			   <option value="Canada" <?php if ($country=="Canada"){echo "Selected ";}?>>Canada</option>
			   <option value="Etats-unis" <?php if ($country=="Etats-unis"){echo "Selected ";}?>>États-Unis</option>
			   <option value="Chine" <?php if ($country=="Chine"){echo "Selected ";}?>>Chine</option>
			   <option value="Japon" <?php if ($country=="Japon"){echo "Selected ";}?>>Japon</option>
		   </select>
		</div>
		</BR>
		</BR>
		<div class="inscrit">
			<?php
				$file = fopen('licence.txt', 'r');
				$contenu = file_get_contents('licence.txt');
				fclose($file);
				$contenu .= " C'est simple ! Donnez-moi tout votre argent et vous pouvez jouer.";
				echo '<textarea rows="10" cols="50">' . $contenu . '</textarea>';
			?>
		</div>
		<div class="inscrit">
			<input type="checkbox" name="accepte" id="accepte" <?php if ($accepte==1){echo "checked ";}?>/>  J'ai 13 ans ou plus et j'accepte les conditions ci-dessus.
		</div>
		</BR></BR>
		<div class="inscrit">
			<button type="submit" class="BtPerso" name="Suite">Soumettre</button>
			<button type="submit" class="BtPerso" name="retour">Retour</button>
		</div>
	</form>			
	</BR></BR>	</BR></BR>
</Body>
</html>