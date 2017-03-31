<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 21/03/2017
 * Time: 17:00
 */

include('Model/ConnexionBD.php');
include_once('Model/OperationsAdherent.php');
include('View/formulaireAdherent.php');

if (isset($_POST['inscrire'])) {
    $adherent_ajoute = new Adherent(0, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['num'], $_POST['dateNaissance'], date("Y-m-d H:i:s"));
    $success = ajouter_adherent($adherent_ajoute);
    if ($success) {
        include('View/adherentAjoute.php');
    } else {
        $msg="Impossible d'ajouter cet adhérent, veuillez réessayer.";
        include('View/pageErreur.php');
    }
}