<?php
//Permet de renouveler un emprunt
    include('Model/ConnexionBD.php');
    include('Model/OperationsAdherent.php');
    if(isRenouvelable(htmlspecialchars($_GET['idEmprunt']))==0){
		renouveler_emprunt(htmlspecialchars($_GET['idEmprunt']));
		include('View/empruntRenouvele.php');
	}else{
		$msg='Vous avez déjà renouvelé cet emprunt.';
        include('View/pageErreur.php');
	}

 ?>
