<?php
include_once('Model/emprunter.php');

$emprunts = listeEmpruntRetard();
include('View/listeEmpruntRetard.php');