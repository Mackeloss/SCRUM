<?php
function retourEmprunter($user,$type,$media){
    include('Model/ConnexionBD.php');
    $var = "UPDATE emprunter SET dateRetour = NOW() WHERE idMedia=:media AND idAdherent=:user AND typeMedia=:type";
    $query=$bdd->prepare($var);
    $query->bindParam(':media', $media, PDO::PARAM_INT);
    $query->bindParam(':user', $user, PDO::PARAM_INT);
    $query->bindParam(':type', $type, PDO::PARAM_STR);
    $query->execute();

    var_dump($media);
    var_dump($type);
    var_dump($user);
}