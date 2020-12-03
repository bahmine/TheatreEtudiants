<?php
  session_start();
  $titre="modification du spectacle ".$_SESSION['noSpec']." du ".$_SESSION['dateRep'];
  include('entete.php');
  
  //recuperation de la nouvelle date
  $newdate = $_POST['newdate'];
  
  //requete
  $requete = "update LesRepresentations set dateRep=to_date('$newdate', 'DD-MM-YYYY HH24:MI') where noSpec=:n and dateRep=to_date(':m', 'DD-MM-YYYY HH24:MI)";
    
  //analyse de la requete
  $curseur = oci_parse($lien, $requete);
  
  // affectation de la variable
	oci_bind_by_name ($curseur,':n',  $_SESSION['noSpec']);
  oci_bind_by_name ($curseur,':m',  $_SESSION['dateRep']);
  
  //execution de la requete
  $ok=@oci_execute($curseur, OCI_NO_AUTO_COMMIT);
  
  if(!ok){
    $error_message = oci_error($curseur);
   echo "<p class=\"erreur\">{$error_message['message']}</p>";
	 echo "<p class=\"erreur\">Verifier les champs date et heure</p>";
   oci_rollback($lien);
  }else{
    
    echo "<p class=\"ok\">Modifier avec succes<br/> nouvelle date: $newdate</p>"; 
    oci_commit($lien);
  }
  oci_free_statement($curseur);
  
  include('pied.php');
?>