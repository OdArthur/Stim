<!-- ~/php/tp1/view/reinitialisationMdp.php -->
<!DOCTYPE html>
<?php session_start();  ?>
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
			require_once("btRetour.php");
			//récupérer les valeurs
			if(isset($_GET['adresse']) and strlen($_GET['adresse'])>6) {$email=htmlspecialchars($_GET['adresse']);} else {$email='nobody';}
			if(isset($_SESSION['mail']) and $email=='nobody') {$email=$_SESSION['mail'];}
			if(isset($_GET['code']) and strlen($_GET['code'])>6) 
			{
				$code=sha1(htmlspecialchars($_GET['code']));
				$oldcode=htmlspecialchars($_GET['code']);
			} else {$code='nobody';}
			if(isset($_SESSION['password']) and $code=='nobody') {$code=$_SESSION['password'];}
			// si une adresse trouvée, on poursuit
			if ($email!='nobody')
			{
				require(__DIR__ . '/../model/chInfosUser.php');
				if (isset($idUser) and $oldpassword==$code) // utilisateur trouvé et code bon
				{
					?>
					<H1><CENTER>Changement de mot de passe</CENTER></H1>
					<br><br><br>
					<form method="post" action="/model/validepassword.php">
						<div class="newuser">
							</br>
							<H2>Choisissez votre nouveau mot de passe : </H2>
							<input type="password" name="password1" id="password1" size="30" maxlength="20" required />
							<input name="submit" id="submitme" type="image" src="/images/aide.png" alt="Aide" onClick="javascript: showMsg(); " style="width: 45px; heigh: auto;" />
							<H2>Confirmez votre nouveau mot de passe : </H2>
							<input type="password" name="password2" id="password2" size="30" maxlength="20" required />
							</BR></BR>
						</div>
						</BR></BR>
						<div class="inscrit">
							<button type="submit" class="BtPerso" name="Suite">Envoyer</button>
							<button type="submit" class="BtPerso" name="retour">Retour</button>
						</div>
						<input type="hidden" name="email" value="<?php echo $email; ?>" />
						<input type="hidden" name="code" value="<?php echo $oldcode; ?>" />
						<input type="hidden" name="idUser" value="<?php echo $idUser; ?>" />
					</form>
					<?php
				}
				else
				{ // utilisateur non trouvé
					btRetour("L'utilisateur n'existe pas !","login.html");
					exit;
				}
			}
			else // si pas de mail ou direte sur la page
			{
				echo '<meta http-equiv="refresh" content="url=login.html">';
				exit;
			}
		?>
	</Body>
</html>