<?php
/*
*OperationsAdherent.php
* Regroupe toutes les opérations en lien avec les adhérents
*
*/

//Retourne les emprunts de type livre d'un adhérent
function get_empruntsLivre($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/Livre.class.php');
 $query=$bdd->prepare("SELECT livre.id, titre, categorie, DATE_FORMAT(date_parution, '%j/%m/%Y'), cover, reserve, idAuteur, resume, type, idEmprunt, dateEmprunt, dateRetour FROM emprunter INNER JOIN adherent ON adherent.id=emprunter.idAdherent INNER JOIN livre ON livre.id=emprunter.idMedia WHERE adherent.id=:idAdherent AND typeMedia='Livre';");
 $query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
 $query->execute();
 $tabEmpruntsLivre=array();
 while($curseur=$query->fetch()){
   $tabEmpruntsLivre[]=array(new Livre($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['idAuteur'],$curseur['$resume'],$curseur['type']),$curseur['dateEmprunt'],$curseur['idEmprunt'],$curseur['dateRetour']);
 }
 return $tabEmpruntsLivre;
}

//Retourne les emprunts de type CD d'un adhérent
function get_empruntsCD($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/CD.class.php');
 $query=$bdd->prepare("SELECT cd.id, titre, categorie, date_parution, cover, reserve, nbPistes, idAuteur, idCompositeur, idInterprete, genre, duree, idEmprunt, dateEmprunt, dateRetour FROM emprunter INNER JOIN adherent ON adherent.id=emprunter.idAdherent INNER JOIN cd ON cd.id=emprunter.idMedia WHERE adherent.id=:idAdherent AND typeMedia='CD';");
 $query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
 $query->execute();
 $tabEmpruntsCD=array();
 while($curseur=$query->fetch()){
   $tabEmpruntsCD[]=array(new CD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['nbPistes'],$curseur['idAuteur'],$curseur['idCompositeur'],$curseur['idInterprete'],$curseur['genre']),$curseur['dateEmprunt'],$curseur['idEmprunt'],$curseur['dateRetour']);
 }
 return $tabEmpruntsCD;
}

//Retourne les emprunts de type DVD d'un adhérent
function get_empruntsDVD($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/DVD.class.php');
 $query=$bdd->prepare("SELECT dvd.id, titre, idCategorie, date_parution, cover, reserve, genre, duree, idRealisateur, idEmprunt, dateEmprunt, dateRetour FROM emprunter INNER JOIN adherent ON adherent.id=emprunter.idAdherent INNER JOIN dvd ON dvd.id=emprunter.idMedia WHERE adherent.id=:idAdherent AND typeMedia='DVD';");
 $query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
 $query->execute();
 $tabEmpruntsDVD=array();
 while($curseur=$query->fetch()){
   $tabEmpruntsDVD[]=array(new DVD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['genre'],$curseur['duree'],$curseur['idRealisateur']),$curseur['dateEmprunt'],$curseur['idEmprunt'],$curseur['dateRetour']);
 }
 return $tabEmpruntsDVD;
}

//Retourne tous les emprunts d'un adhérent
function get_allemprunts($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/CD.class.php');
 include_once('Model/Class/DVD.class.php');
 include_once('Model/Class/Livre.class.php');
 $tabEmpruntsCD=get_empruntsCD($idAdherent);
 $tabEmpruntsDVD=get_empruntsDVD($idAdherent);
 $tabEmpruntsLivre=get_empruntsLivre($idAdherent);
 $tabAllEmprunts=array_merge($tabEmpruntsCD,$tabEmpruntsDVD,$tabEmpruntsLivre);
 return $tabAllEmprunts;
}


//Retourne les réservations de type livre d'un adhérent
function get_reservationsLivre($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/Livre.class.php');
 $query=$bdd->prepare("SELECT livre.id, titre, categorie, date_parution, cover, reserve, idAuteur, resume, type, idReservation, dateReservation FROM reserver INNER JOIN adherent ON adherent.id=reserver.idAdherent INNER JOIN livre ON livre.id=reserver.idMedia WHERE adherent.id=:idAdherent AND typeMedia='Livre';");
 $query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
 $query->execute();
 $tabReservationsLivre=array();
 while($curseur=$query->fetch()){
   $tabReservationsLivre[]=array(new Livre($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['idAuteur'],$curseur['$resume'],$curseur['type']),$curseur['dateReservation'],$curseur['idReservation']);
 }
 return $tabReservationsLivre;
}

//Retourne les réservations de type CD d'un adhérent
function get_reservationsCD($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/CD.class.php');
 $query=$bdd->prepare("SELECT cd.id, titre, categorie, date_parution, cover, reserve, nbPistes, idAuteur, idCompositeur, idInterprete, genre, duree, idReservation, dateReservation FROM reserver INNER JOIN adherent ON adherent.id=reserver.idAdherent INNER JOIN cd ON cd.id=reserver.idMedia WHERE adherent.id=:idAdherent AND typeMedia='CD';");
 $query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
 $query->execute();
 $tabReservationsCD=array();
 while($curseur=$query->fetch()){
   $tabReservationsCD[]=array(new CD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['nbPistes'],$curseur['idAuteur'],$curseur['idCompositeur'],$curseur['idInterprete'],$curseur['genre']),$curseur['dateReservation'],$curseur['idReservation']);
 }
 return $tabReservationsCD;
}

//Retourne les réservations de type DVD d'un adhérent
function get_reservationsDVD($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/DVD.class.php');
 $query=$bdd->prepare("SELECT dvd.id, titre, idCategorie, date_parution, cover, reserve, genre, duree, idRealisateur, idReservation, dateReservation FROM reserver INNER JOIN adherent ON adherent.id=reserver.idAdherent INNER JOIN dvd ON dvd.id=reserver.idMedia WHERE adherent.id=:idAdherent AND typeMedia='DVD';");
 $query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
 $query->execute();
 $tabReservationsDVD=array();
 while($curseur=$query->fetch()){
   $tabReservationsDVD[]=array(new DVD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['genre'],$curseur['duree'],$curseur['idRealisateur']),$curseur['dateReservation'],$curseur['idReservation']);
 }
 return $tabReservationsDVD;
}

//Retourne l'ensemble des réservations d'un adhérent
function get_reservations($idAdherent){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/CD.class.php');
 include_once('Model/Class/DVD.class.php');
 include_once('Model/Class/Livre.class.php');
 $tabReservationsCD=get_reservationsCD($idAdherent);
 $tabReservationsDVD=get_reservationsDVD($idAdherent);
 $tabReservationsLivre=get_reservationsLivre($idAdherent);
 $tabAllReservations=array_merge($tabReservationsCD,$tabReservationsDVD,$tabReservationsLivre);
 return $tabAllReservations;
}

//Supprimer la réservation correspondant à l'ID fourni en paramètre
function supprimer_reservation($idReservation){
  include('Model/ConnexionBD.php');
  $query = $bdd->prepare('SELECT * FROM reserver WHERE idReservation = :idReservation;');
  $query->bindParam(':idReservation', $idReservation, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $id=$curseur['idMedia'];
  $type=$curseur['typeMedia'];
  $query = $bdd->prepare('DELETE FROM reserver where idReservation = :idReservation');
  $query->bindParam(':idReservation', $idReservation, PDO::PARAM_INT);
  $query->execute();
  $query = $bdd->prepare('DELETE FROM reserver where idReservation = :idReservation');
  $query->bindParam(':idReservation', $idReservation, PDO::PARAM_INT);
  $query->execute();
  /*switch($type){
		case 'Livre': ...
	}*/
}

//Renouveler l'emprunt dont l'ID est en paramètre
function renouveler_emprunt($idEmprunt){
 include('Model/ConnexionBD.php');
 $query=$bdd->prepare('SELECT * FROM emprunter WHERE idEmprunt=:idEmprunt;');
 $query->bindParam(':idEmprunt', $idEmprunt, PDO::PARAM_INT);
 $query->execute();
 $curseur=$query->fetch();
 if($curseur['renouvele']==0){
	$query=$bdd->prepare('UPDATE emprunter SET dateRetour=DATE_ADD(dateRetour, INTERVAL 14 DAY) WHERE idEmprunt=:idEmprunt;');
	$query->bindParam(':idEmprunt', $idEmprunt, PDO::PARAM_INT);
	$query->execute();
	$query=$bdd->prepare('UPDATE emprunter SET renouvele=1 WHERE idEmprunt=:idEmprunt;');
	$query->bindParam(':idEmprunt', $idEmprunt, PDO::PARAM_INT);
	$query->execute();
 }
}

//Vérifie qu'un emprunt, dont l'ID est passé en paramètre, est renouvelable
function isRenouvelable($idEmprunt){
 include('Model/ConnexionBD.php');
 $query=$bdd->prepare('SELECT * FROM emprunter WHERE idEmprunt=:idEmprunt;');
 $query->bindParam(':idEmprunt', $idEmprunt, PDO::PARAM_INT);
 $query->execute();
 $curseur=$query->fetch();
 return $curseur['renouvele'];
}

function ajouter_adherent($adherent) {
 include('Model/ConnexionBD.php');
}

?>
