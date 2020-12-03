<?php
  $titre="Reservation";
  include('entete.php');

  //requete
  $requete = ("select noSpec, nomS, to_char(dateRep, 'DD-MON-YY HH')
               from LesSpectacles natural join LesRepresentations ");
  
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
				<form action=\"GererReservation_action.php\" method=\"post\">
          <label for=\"sel_noSerie\">Nom :</label>
            <input type=\"text\" name=\"nom\" />
          <label for=\"sel_noSerie\">Prenom :</label>
            <input type=\"text\" name=\"prenom\" /> <br/><br/>
					<label for=\"sel_noSerie\">Sélectionnez un spectacle :</label>
					<select id=\"sel_noSerie\" name=\"noSpec\">
			");

			// création des options pour les spectacles
			do {

				$noSpec = oci_result($curseur, 1);
        $nomS = oci_result($curseur, 2);
        $dateRep = oci_result($curseur, 3);
        
				echo ("<option value=\"$noSpec\">$nomS $dateRep</option>");

			} while ($res = oci_fetch ($curseur));

			echo ("
					</select>
           <label for=\"sel_noSerie\">Nombre de Ticket :</label>
            <input type=\"number\" name=\"nbTicket\" size=\"2\" min=\"1\" max=\"99\" /> <br/><br/>
           <label for=\"sel_noSerie\">Adresse Electronique :</label>
            <input type=\"email\" name=\"mail\" /> 
            <label for=\"sel_noSerie\">Mode de Paiement :
              CB: <input type=\"radio\" name=\"paiement\" /> PayPal: <input type=\"radio\" name=\"paiement\" /><br/><br/>
            </label>
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