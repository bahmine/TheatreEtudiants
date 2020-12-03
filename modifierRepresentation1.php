<?php
  session_start();
  $_SESSION['noSpec'] = $_POST['noSpec'];
  
  $titre="choisisser la date a modifier pour le spectacle ".$_SESSION['noSpec'];
  
  include('entete.php');
  
  

  //requete
  $requete = ("select to_char(dateRep, 'DD-MON-YY HH')
               from LesRepresentations 
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
				<form action=\"modifierRepresentation2.php\" method=\"post\">
					<select id=\"sel_noSerie\" name=\"dateRep\">
			");

			// création des options pour les spectacles
			do {
          $dateRep = oci_result($curseur, 1);
          
          echo ("<option value=\"$dateRep\">$dateRep H</option>");

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