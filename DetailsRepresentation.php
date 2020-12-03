<?php
  $titre="Details de Representation des spectacles";
  include('entete.php');
  
  //construction de la requete
  $requete = ("SELECT nomS
               FROM theatre.LesSpectacles
            ");
  
  // analyse de la requete et association au curseur
	$curseur = oci_parse ($lien, $requete) ;

	// execution de la requete
	$ok = @oci_execute ($curseur) ;
 
 // on teste $ok pour voir si oci_execute s'est bien passé
	if (!$ok) {

		// oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";
	}else {

			// on affiche le formulaire de sélection
			echo ("
				<form action=\"DetailsRepresentation_action.php\" method=\"post\">
					<label for=\"sel_noSerie\">Sélectionnez un Spectacle :</label>
					<select id=\"sel_noSerie\" name=\"nomS\">
			");
      
      // création des options
			do {

				$nomS = oci_result($curseur, 1);
				echo ("<option value=\"$nomS\">$nomS</option>");

			} while ($res = oci_fetch ($curseur));
      
      //bouton valider et annuler
      echo ("
					</select>
					<br /><br />
					<input type=\"submit\" value=\"Valider\" />
					<input type=\"reset\" value=\"Annuler\" />
				</form>
			");
      
   }

	// on libère le curseur
	oci_free_statement($curseur);
 
 include('pied.php');
?>