<?php
  session_start();
  $_SESSION['dateRep'] = $_POST['dateRep'];
  $titre="modification du spectacle ".$_SESSION['noSpec']." du ".$_SESSION['dateRep'];
  
  include('entete.php');
  
  echo("<form action=\"modifierRepresentation_action.php\" method=\"POST\">
        <label for=\"sel_noSerie\">Entrer la nouvelle date :</label>
        <input type=\"date\" name=\"newdate\" value=\"DD-MM-YY HH:MI\" />
  ");
  
  echo("<br /><br />
					<input type=\"submit\" value=\"Valider\" />
					<input type=\"reset\" value=\"Annuler\" />
        </form>");
  
  include('pied.php');
 
?>