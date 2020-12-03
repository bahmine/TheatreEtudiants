<?php
  $titre="Numero, nom, date de representations et nombre de place pour chaque spectacle";
  include('entete.php');

  //construction de la requete
  $requete=("
    select noSpec, nomS, to_char(dateRep, 'DD-Mon-YY HH'), count(dateRep)
    from theatre.LesSpectacles natural join theatre.LesRepresentations natural join theatre.LesTickets
    group by noSpec, nomS, dateRep
  ");

  //analyse de la requete
  $curseur=oci_parse($lien, $requete);
  
  //execution de la requete
  $ok=@oci_execute($curseur);
  
  // on teste $ok pour voir si oci_execute s'est bien passé
  if(!$ok){
  // oci_execute a échoué, on affiche l'erreur
		$error_message = oci_error($curseur);
		echo "<p class=\"erreur\">{$error_message['message']}</p>";
  }else{ 
  //tableau d'affichage
    echo("<table><tr><th>noSpec</th><th>nomSpectacle</th><th>dateRepresentation</th><th>nombre de Place</th></tr>");
    
    // création des options
			while (oci_fetch ($curseur)) {  
          
				  $noSpec = oci_result($curseur, 1);
          $nomS = oci_result($curseur, 2);
          $dateRep = oci_result($curseur, 3);
          $nbPlace = oci_result($curseur, 4);
          
				  echo ("<tr><td>$noSpec</td><td>$nomS</td><td>$dateRep H</td><td>$nbPlace</td></tr>");
			} ;
      echo("</table>");
      
  }
  
  
	// on libère le curseur
	oci_free_statement($curseur);
 
  
  include('pied.php');
?>