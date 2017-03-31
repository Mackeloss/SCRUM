<?php
function emprunter($user,$type,$media){
    include('Model/ConnexionBD.php');
    $var = "INSERT INTO emprunter(dateRetour) VALUES(NOW()) ";
    $query=$bdd->prepare($var);
    $query->execute();
}