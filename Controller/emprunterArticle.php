<?php
//Permet d" emprunter un article si l'on est connecté
include_once('Model/rechercher.php');
$tabUtilisateur = array();
$tabMedia = array();
switch ($_GET['action']){
    case 'rechercheUtilisateur':
        $tabUtilisateur = get_AdherentByParam($_POST['username']);
        break;
    case 'selectionUtilisateur':
        break;
    case 'rechercheMedia':
        $tabMedia = get_MediaByParam($_POST['username']);
        break;
    case 'selectionMedia':
        break;
    default:

        break;
}
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
