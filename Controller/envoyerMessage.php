<?php
//Envoie le message saisi dans le formulaire de contact à l'adresse aymericpalhiere@gmail.com
  mail('ericMartin@gmail.com','Message de '.$_SESSION['adherent']->getPrenom().' '.$_SESSION['adherent']->getPrenom(),htmlspecialchars($_POST['message']));
  include('View/messageEnvoye.php');
 ?>
