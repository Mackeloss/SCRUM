<?php
//Permet d'annuler une resérvation
    include('Model/ConnexionBD.php');
    include('Model/OperationsAdherent.php');
    supprimer_reservation(htmlspecialchars($_GET['idReservation']));
    include('View/reservationSupprime.php');


 ?>
