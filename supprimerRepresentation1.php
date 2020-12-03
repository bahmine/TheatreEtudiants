<?php
  session_start();
  $titre="cochez sur la representation a supprimer";
  
  include('entete.php');
  
  $_SESSION['noSpec'] = $_POST['noSpec'];

  //requete
  $requete = ("select noSpec, nomS, to_char(dateRep, 'DD-MON-YY HH')
               from LesSpectacles natural join LesRepresentations 
               where noSpec=:n");
  
  //analyse de la requete
  $curseur = oci_parse($lien, $requete);
  
  // affectation de la variable
	oci_bind_by_name ($curseur,':n',  $_SESSION['noSpec']);
  
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
				<form action=\"supprimerRepresentation_action.php\" method=\"post\">
					<table>
          <tr><th>nomSpectacle</th><th>DateRepresentation</th><th>modifier</th></tr>
			");

			// création des options pour les spectacles
			do {

				$noSpec = oci_result($curseur, 1);
        $nomS = oci_result($curseur, 2);
        $dateRep = oci_result($curseur, 3);
        
				echo ("<tr><td>$nomS</td><td>$dateRep H</td><td><input type=\"radio\" name=\"$noSpec\" /></td></tr>");

			} while ($res = oci_fetch ($curseur));

			echo ("
					</table>
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