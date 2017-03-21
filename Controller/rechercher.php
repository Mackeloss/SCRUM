<?php
//Permet d'effectuer une recherche dans le catalogue
    include('Model/ConnexionBD.php');
    include('Model/OperationsMedia.php');
    $tabMedia = rechercher_media(htmlentities($_POST['keyword']));
    include('View/afficherCatalogue.php');

 ?>
