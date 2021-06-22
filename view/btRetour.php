<!-- ~/php/tp1/view/btRetour.php -->
<?php
	function btRetour($message, $adresse)
	{
		echo '<div id="pageinscription">';
			echo '<div class="inscrit">';
				if ($message!="")
				{
					echo "<H2>" . $message . "<br>Merci de recommencer.</H2>";
				}
			echo '</div></BR>';
			echo '<div class="inscrit">';
				if ($message!="" and $adresse!='')
				{
					echo '<form action="' . $adresse . '"><br />';
						echo '<button type="submit" class="BtPerso" name="Retour">Retour</button>';
					echo '</form>';
					exit();
				}
				echo '</BR></BR></BR></BR>';
			echo '</div>';
		echo '</div>';
	}
?>