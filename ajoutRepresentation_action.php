<?php
  $titre = "Ajout d'une representation";
  include('entete.php');
    
  //recupere le numero du spectacle
  $noSpec = $_POST['noSpec'];
  
  //on recupere la date saisie
  $date = $_POST['date'];
 
  //requete 
  $requete = (" INSERT INTO LesRepresentations values (to_date('$date', 'DD-MM-YYYY HH24:MI'), $noSpec) ");


  //test de la requete
  $curseur=oci_parse($lien, $requete);

  //execution de la requete
  $ok= @oci_execute ($curseur, OCI_NO_AUTO_COMMIT);
  
  //test de l'execution	
  if (!$ok) {
   // oci_execute a echoue, on affiche l'erreur
   $error_message = oci_error($curseur);
   echo "<p class=\"erreur\">{$error_message['message']}</p>";
	 echo "<p class=\"erreur\">Verifier les champs date et heure</p>";
   oci_rollback($lien);
  }else {
    echo "<p class=\"ok\">Enregistrer avec succes</p>"; 
    oci_commit($lien);

    //on libere le curseur
    oci_free_statement($curseur);

     echo "<p class=\"ok\">Recapitulatif</p>";
     
    //on recupere le nom du spectacle pour le recap
   $req = "select nomS from LesSpectacles where noSpec=$noSpec";
    //analyse de la requete
   $curseur = oci_parse($lien, $req);
  
   //execution de la requete
   $ok=@oci_execute($curseur);
  
   $res = oci_fetch ($curseur);

   //on affecte nomS au nom du spectacle
    echo("<table>
		<tr><th>NoSpec</th><th>NomSpec</th><th>dateSpec</th></tr>");
		do {
			$nomS = oci_result($curseur,1);
        		echo ("<tr><td>$noSpec</td><td>$nomS</td><td>$date</td></tr>");

			} while ($res = oci_fetch ($curseur));
	 echo("</table>"); 
}
  
  oci_free_statement($curseur);
  include('pied.php');
?>
