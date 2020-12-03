<?php
  $titre="Les Representations vides";
  include('entete.php');
  
  //construction de la requete
  $requete=("select noSpec, dateRep, nomS
             from theatre.LesRepresentations natural join theatre.LesSpectacles
              minus
             select noSpec, dateRep, nomS
             from theatre.LesTickets natural join theatre.LesRepresentations natural join theatre.LesSpectacles             
             ");
  
  //ananlyse de la requete
  $curseur = oci_parse($lien, $requete);
 
  //execution de la requete
  $ok = @oci_execute($curseur);
  
   // on teste $ok pour voir si oci_execute s'est bien passé
	if (!$ok) {

		// oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";
	}
  else{
        $res=oci_fetch ($curseur);
        if (!$res) {
          // il n'y a aucun résultat
			    echo "<p class=\"erreur\"><b>Aucun Spectacle dans la base de donnee</b></p>" ;
       }else{
         //tableau d'affichage
        echo("<table><tr><th>noSpec</th><th>dateRepresentation</th><th>nomSpectacle</th></tr>");
    
        // création des options
			  do {  
				  $noSpec = oci_result($curseur, 1);
          $nomS = oci_result($curseur, 2);
          $dateRep = oci_result($curseur, 3);
				  echo ("<tr><td>$noSpec</td><td>$nomS</td><td>$dateRep</td></tr>");
			  } while (oci_fetch ($curseur));
        echo("</table>");
     };
  }
  
  
	// on libère le curseur
	oci_free_statement($curseur);
 
 
  include('pied.php');
?>