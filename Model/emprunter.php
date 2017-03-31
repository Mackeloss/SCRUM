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