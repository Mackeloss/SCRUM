<?php
//Permet d'enregistrer un retour d'emprunt
include_once('Model/rechercher.php');
include_once('Model/retourEmprunt.php');
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

?>
