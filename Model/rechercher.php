<?php

//Retourne les emprunts de type livre d'un adhérent
function get_AdherentByParam($param){
    include('Model/ConnexionBD.php');
    $query=$bdd->prepare("SELECT * FROM adherent
          WHERE nom LIKE '%:param%'
          OR prenom LIKE '%:param%';");
    $query->bindParam(':param', $param, PDO::PARAM_STR);
    $query->execute();
    $adherents = $query->fetchAll();
    return $adherents;
}

function get_MediaByParam($param){
    include('Model/ConnexionBD.php');
    //dvd
    $query=$bdd->prepare("SELECT * FROM dvd
          WHERE titre LIKE '%:param%';");
    $query->bindParam(':param', $param, PDO::PARAM_STR);
    $query->execute();
    $dvds = $query->fetchAll();

    //livre
    $query=$bdd->prepare("SELECT * FROM livre
          WHERE titre LIKE '%:param%';");
    $query->bindParam(':param', $param, PDO::PARAM_STR);
    $query->execute();
    $livres = $query->fetchAll();

    //cd
    $query=$bdd->prepare("SELECT * FROM cd
          WHERE titre LIKE '%:param%';");
    $query->bindParam(':param', $param, PDO::PARAM_STR);
    $query->execute();
    $cds = $query->fetchAll();

    return array_merge($dvds,$livres,$cds);

}