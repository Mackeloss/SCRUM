<?php
//Affiche la page d'accueil
  include('Model/ConnexionBD.php');

  include_once('Model/OperationsNews.php');
  $tabNews = get_allnews(0,5);

  include('View/index.php');
?>
