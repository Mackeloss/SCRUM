<?php
//Permet d" emprunter un article si l'on est connecté
include_once('Model/rechercher.php');
include_once('Model/emprunter.php');
$tabUtilisateur = array();
$tabMedia = array();

if(isset($_GET['user'])){
    $user = $_GET['user'];
}else{
    $user ="";
}

if(isset($_GET['media'])){
    $media = $_GET['media'];
    $type = $_GET['type'];
}else{
    $media ="";
    $type ="";
}
if(isset($_GET['action'])){
    switch ($_GET['action']){
        case 'rechercheUtilisateur':
            $etape = 2;
            $tabUtilisateur = get_AdherentByParam($_POST['username']);
            include('View/mediaEmprunte.php');
            break;
        case 'selectionUtilisateur':
            $etape = 3;
            include('View/mediaEmprunte.php');
            break;
        case 'rechercheMedia':
            $etape = 4;
            $user = $_POST['user'];
            $tabMedia = get_MediaByParam($_POST['media']);
            include('View/mediaEmprunte.php');
            break;
        case 'selectionMedia':
            emprunter($_GET['user'],$_GET['type'],$_GET['media']);
            include('View/EmpruntOK.php');
            break;
        default:

            break;
    }
}else{
    $etape = 1;
    include('View/mediaEmprunte.php');
}


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
