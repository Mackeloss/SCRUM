<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 21/03/2017
 * Time: 17:00
 */

include('Model/ConnexionBD.php');
include_once('Model/OperationsAdherent.php');

if (isset($_GET['action'])) {
    $time = strtotime($_POST['dateNaissance']);
    $date_naissance = date('Y-m-d', $time);
    $adherent_ajoute = new Adherent(0, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['num'], $date_naissance, date("Y-m-d"));
    $success = ajouter_adherent($adherent_ajoute, $_POST['username'], sha1($_POST['mdp']));
    if ($success) {
        include('View/adherentAjoute.php');
    } else {
        $msg="Impossible d'ajouter cet adhérent, veuillez réessayer.";
        include('View/pageErreur.php');
    }
} else {
    include('View/formulaireAdherent.php');
}