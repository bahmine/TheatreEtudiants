<?php
  session_start();
  $titre="Suppression d'une representation";
  include('entete.php');
  
  $dateRep=$_POST['dateRep'];
    
  //requete
  $requete = "delete from LesRepresentations where noSpec=:n and to_char(dateRep, 'DD-MON-YY HH')=:m";
    
  //analyse de la requete
  $curseur = oci_parse($lien, $requete);
  
  // affectation de la variable
	oci_bind_by_name ($curseur,':n',  $_SESSION['noSpec']);
  oci_bind_by_name ($curseur,':m',  $dateRep);
  
  //execution de la requete
  $ok=@oci_execute($curseur);
  
  if(!ok){
    echo ("SUPRESSION ERRONEE");
    oci_rollback ($lien) ;
  }else{
    
    echo LeMessage ("majOK") ;
			// terminaison de la transaction : validation
			oci_commit ($lien) ;
  }
  oci_free_statement($curseur);
  
  include('pied.php');
?>