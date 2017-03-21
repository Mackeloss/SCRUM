<?php
//Permet d'afficher le catalogue des médias
  include('Model/ConnexionBD.php');
  include_once('Model/OperationsMedia.php');
  $tabMedia = get_allmedia();
  include_once('View/afficherCatalogue.php');
?>
