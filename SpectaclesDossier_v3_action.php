<?php 
  session_start();
  
  
  // récupération du numero de dossier
	$nd=$_SESSION['noDossier'];
 //recuperation de la categorie
  $categorie=$_POST['nomC'];
 //
	$titre = "Liste des places pour le dossier $nd de la categorie $categorie ";
  include('entete.php');
  
  //requete
  $requete=("select distinct noPlace, noRang
             from theatre.LesTickets natural join theatre.LesZones natural join theatre.LesSieges
             where noDossier= :n and lower(nomC) = lower(:m)
             order by noPlace
  ");
  
  // analyse de la requete et association au curseur
	$curseur = oci_parse ($lien, $requete) ;

	// affectation de la variable
	oci_bind_by_name ($curseur, ':n', $nd);
  oci_bind_by_name ($curseur, ':m', $categorie);
 // execution de la requete
	$ok = @oci_execute ($curseur) ;

	// on teste $ok pour voir si oci_execute s'est bien passé
	if (!$ok) {
 
		// oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";
   
	}
  else {

		// oci_execute a réussi, on fetch sur le premier résultat
		$res = oci_fetch ($curseur);

		if (!$res) {

			// il n'y a aucun résultat
			echo "<p class=\"erreur\"><b>Aucune Place</b></p>" ;

		}
		else {

			// on affiche la table qui va servir a la mise en page du resultat
			echo "<table><tr><th>noPlace</th><th>noRang</th></tr>" ;

			// on affiche un résultat et on passe au suivant s'il existe
			do {

				$noPlace = oci_result($curseur, 1) ;
				$noRang = oci_result($curseur, 2) ;
        
				echo "<tr><td>$noPlace</td><td>$noRang</td></tr>";

			} while (oci_fetch ($curseur));

			echo "</table>";
		}

	}

	// on libère le curseur
	oci_free_statement($curseur);
  include('pied.php');    

?>
