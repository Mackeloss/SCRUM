<?php
function emprunter($user,$type,$media){
    include('Model/ConnexionBD.php');
    $var = "INSERT INTO emprunter(idMedia,idAdherent,dateEmprunt,typeMedia) VALUES(:media,:user,NOW(),:type) ";
    $query=$bdd->prepare($var);
    $query->bindParam(':media', $media, PDO::PARAM_INT);
    $query->bindParam(':user', $user, PDO::PARAM_INT);
    $query->bindParam(':type', $type, PDO::PARAM_STR);
    $query->execute();
}


function listeEmpruntRetard(){
    include('Model/ConnexionBD.php');
    $var = "SELECT * FROM emprunter
            JOIN adherent ON adherent.id = emprunter.idAdherent
            WHERE dateRetour IS NULL
            AND DATE_ADD(dateEmprunt,INTERVAL (SELECT dureeEmprunt FROM configuration) DAY) < NOW() ";
    $query=$bdd->prepare($var);
    $query->execute();
    $emprunts = $query->fetchAll();

    $listeEmpruntRetard = array();
    foreach ($emprunts as $emprunt){
        switch ($emprunt['typeMedia']){
            case 'dvd':
                $var = "SELECT * FROM dvd
                    WHERE id = :param";
                break;
            case 'cd':
                $var = "SELECT * FROM dvd
                    WHERE id = :param";
                break;
            case 'livre':
                $var = "SELECT * FROM dvd
                    WHERE id = :param";
                break;
        }
        $query=$bdd->prepare($var);
        $query->bindParam(':param', $emprunt['idMedia'], PDO::PARAM_INT);
        $query->execute();
        $ret = $query->fetch();
        $media = array(
            "nom" => $emprunt['nom'],
            "prenom" => $emprunt['prenom'],
            "typeMedia" => $emprunt['typeMedia'],
            "dateEmprunt" => $emprunt['dateEmprunt'],
            "titre" => $ret['titre']);
        array_push($listeEmpruntRetard,$media);

    }
    return $listeEmpruntRetard;
}