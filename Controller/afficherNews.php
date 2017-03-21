<?php
//Affiche le détail d'une news
  include('Model/ConnexionBD.php');
  include_once('Model/OperationsNews.php');
  $news = getNews(htmlentities($_GET['id']));
  include('View/afficherNews.php');
  ?>
