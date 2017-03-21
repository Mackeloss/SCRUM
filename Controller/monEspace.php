<?php
//Affiche l'espace d'un adhérent avec ses emprunts et réservations
  include('Model/ConnexionBD.php');
  include_once('Model/OperationsAdherent.php');
  $tabEmprunts = get_allemprunts($_SESSION['adherent']->getId());
  $tabReservations = get_reservations($_SESSION['adherent']->getId());
  //$tabReservations = get_reservations(htmlspecialchars($_GET['id']));
  include('View/monEspace.php');
?>
