<?php
  $titre="Modification d'une representation";
  include('entete.php');

  //requete
  $requete = ("select noSpec, nomS
               from LesSpectacles ");
  
  //analyse de la requete
  $curseur = oci_parse($lien, $requete);
  
  //execution de la requete
  $ok=@oci_execute($curseur);
  
  // on teste $ok pour voir si oci_execute s'est bien passé
	if (!$ok) {

		// oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";
  }else	{
    // oci_execute a réussi, on fetch sur le premier résultat
		$res = oci_fetch ($curseur);

		if (!$res) {

			// il n'y a aucun résultat
			echo "<p class=\"erreur\"><b>Aucun Spectacle dans la base de donnee</b></p>" ;

		}
		else {

			// on affiche le formulaire de sélection
			echo ("
				<form action=\"modifierRepresentation1.php\" method=\"post\">
					<label for=\"sel_noSerie\">Sélectionnez un spectacle :</label>
					<select id=\"sel_noSerie\" name=\"noSpec\">
			");

			// création des options pour les spectacles
			do {

				$noSpec = oci_result($curseur, 1);
        $nomS = oci_result($curseur, 2);
        
				echo ("<option value=\"$noSpec\">$nomS</option>");

			} while ($res = oci_fetch ($curseur));

			echo ("
					</select>
           
					<br /><br />
					<input type=\"submit\" value=\"Valider\" />
					<input type=\"reset\" value=\"Annuler\" />
				</form>
			");

		}

	}

	// on libère le curseur
	oci_free_statement($curseur);
  
  
  
  include('pied.php');
?>