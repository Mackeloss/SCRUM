<?php
//Permet d" emprunter un article si l'on est connecté

$tabMedia = null;
$tabUtilisateur = null;
include('View/mediaEmprunte.php');
    /*include('Model/ConnexionBD.php');
    include('Model/OperationsMedia.php');
    $media = get_media(htmlentities($_GET['idMedia']),htmlentities($_GET['typeMedia']));
    if($media!=null){
      reserver_media($_SESSION['adherent']->getId(),$media);
      include('View/mediaReserve.php');
    }else{
      $msg="Impossible de réserver le média, veuillez réessayer.";
      include('View/pageErreur.php');
    }*/

 ?>
