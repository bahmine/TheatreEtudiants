<?php

	$titre = 'Liste des places associées au dossier 11 pour une catégorie donnée';
	include('entete.php');

  // construction de la requete
	$requete = ("
		SELECT distinct noDossier
		FROM theatre.LesTickets
    ORDER BY noDossier
	");
 
	// analyse de la requete et association au curseur
	$curseur = oci_parse ($lien, $requete) ;

		// execution de la requete
	$ok = @oci_execute ($curseur) ;
 
 if (!$ok) {

		// oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";

	}else{
   
   

			// on affiche le formulaire qui va servir a la mise en page du resultat
			echo ("<form action=\"SpectaclesDossier_v3_1_action.php\" method=\"POST\">
			          <label for=\"inp_categorie\">Veuillez choisir un numero de dossier:</label>
                <select id=\"sel_noSerie\" name=\"noDossier\">
           ") ;

			// on affiche un résultat et on passe au suivant s'il existe
			do {

				$noDossier = oci_result($curseur, 1) ;
         echo ("<option value=\"$noDossier\">$noDossier</option>");

			} while ($res = oci_fetch ($curseur));
			echo ("</select>
                <br /><br />
                <input type=\"submit\" value=\"Valider\" />
			          <input type=\"reset\" value=\"Annuler\" />
		          </form>");
   
 }
	// travail à réaliser
	echo ("
		<p class=\"work\">
			Ajoutez une étape à cet enchaînement de scripts de façon à obtenir le fonctionnement suivant :
			<ul>
				<li><b>Etape 1 :</b> un formulaire nous demande de choisir un numéro de dossier dans une liste extraite de la base de données</li>
				<li><b>Etape 2 :</b> pour le numéro de dossier choisi, un formulaire nous demande de sélectionner une catégorie dans une liste qui ne contiendra que les catégories concernées par le numéro de dossier demandé</li>
				<li><b>Etape 3 :</b> affichage de la liste des places correspondant à la catégorie et au numéro de dossier sélectionnés</li>
			</ul>
		</p>
	");
// on libère le curseur
	oci_free_statement($curseur);
	include('pied.php');

?>
