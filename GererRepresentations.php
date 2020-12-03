<?php
  $titre="Gestion de la representation";
  include('entete.php');
  
  echo("<ul class=\"menu\">
        <li><a href=\"ajoutRepresentation.php\">Ajouter une Representation </a></li>
        <li><a href=\"modifierRepresentation.php\">Modifier une Representation </a></li>
        <li><a href=\"supprimerRepresentation.php\">Supprimer une Representation </a></li>
        </ul>
  ");
  
  include('pied.php');
?>