<?php
  session_start();
  
  include('entete.php');

  // récupération du numero de dossier
	$_SESSION['noDossier'] = $_POST['noDossier'];
 //
	$titre = "Liste des Categories pour le dossier no $categorie";
 
 // construction de la requete
	$requete = ("
		select distinct nomC
    from theatre.LesZones natural join theatre.LesSieges natural join theatre.LesTickets
		WHERE noDossier = :n
	");

  // analyse de la requete et association au curseur
	$curseur = oci_parse ($lien, $requete) ;

	// affectation de la variable
	oci_bind_by_name ($curseur, ':n', $_SESSION['noDossier']);

	// execution de la requete
	$ok = @oci_execute ($curseur) ;

	// on teste $ok pour voir si oci_execute s'est bien passé
	if (!$ok) {
 
		// oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";
   
	}else{
       // oci_execute a réussi, on fetch sur le premier résultat
		  $res = oci_fetch ($curseur);

      if (!$res) {
  	  // il n'y a aucun résultat
			echo "<p class=\"erreur\"><b>Aucun dossier correspondant au numero choisi ou Dossier inconnu</b></p>" ;
		  }else {

			// on affiche la table qui va servir a la mise en page du resultat
			echo ("<form action=\"SpectaclesDossier_v3_action.php\" method=\"POST\">
			          <label for=\"inp_categorie\">Veuillez choisir une categorie:</label>
                <select id=\"sel_noSerie\" name=\"nomC\">") ;

			// on affiche un résultat et on passe au suivant s'il existe
			do {

				$nomC = oci_result($curseur, 1) ;
         echo ("<option value=\"$nomC\">$nomC</option>");

			} while ($res = oci_fetch ($curseur));
			echo ("</select>
                <br /><br />
                <input type=\"submit\" value=\"Valider\" />
			          <input type=\"reset\" value=\"Annuler\" />
		          </form>");
		}
 }
  // on libère le curseur
	oci_free_statement($curseur);
  include('pied.php');
?>