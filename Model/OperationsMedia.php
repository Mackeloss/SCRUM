<?php
/*
*OperationsMedia.php
* Regroupe toutes les opérations en lien avec les medias
*
*/

//Retourne tous les livres de la BD sous forme de tableau
function get_allLivre(){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/Livre.class.php');
 $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,categorie,cover,reserve,idAuteur,resume,type FROM livre;');
 $query->execute();
 $tabLivre=array();
 while($curseur=$query->fetch()){
   $tabLivre[]=new Livre($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'], $curseur['reserve'],$curseur['idAuteur'],$curseur['resume'],$curseur['type']);
 }
 return $tabLivre;
}

//Retourne tous les CD de la BD sous forme de tableau
function get_allCD(){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/CD.class.php');
 $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,categorie,cover,reserve,nbPistes,idAuteur,idCompositeur,idInterprete,genre FROM cd;');
 $query->execute();
 $tabCD=array();
 while($curseur=$query->fetch()){
   $tabCD[]=new CD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['nbPistes'],$curseur['idAuteur'],$curseur['idCompositeur'],$curseur['idInterprete'],$curseur['genre']);
 }
 return $tabCD;
}

//Retourne tous les DVD de la BD sous forme de tableau
function get_allDVD(){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/DVD.class.php');
 $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,idCategorie,cover,reserve,genre,duree,idRealisateur FROM dvd;');
 $query->execute();
 $tabDVD=array();
 while($curseur=$query->fetch()){
   $tabDVD[]=new DVD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['genre'],$curseur['duree'],$curseur['idRealisateur']);
 }
 return $tabDVD;
}

//Retourne tous les médias de la BD sous forme de tableau
function get_allmedia(){
 include('Model/ConnexionBD.php');
 include_once('Model/Class/Media.class.php');
 include_once('Model/Class/CD.class.php');
 include_once('Model/Class/DVD.class.php');
 include_once('Model/Class/Livre.class.php');
 $tabCD=get_allCD();
 $tabDVD=get_allDVD();
 $tabLivre=get_allLivre();
 $tabAllMedia=array_merge($tabCD,$tabDVD,$tabLivre);
 return $tabAllMedia;
}

//Retourne le CD correspondant à l'ID fourni en paramètre
function get_CD($idCD){
  include('Model/ConnexionBD.php');
  include_once('Model/Class/Media.class.php');
  include_once('Model/Class/CD.class.php');
  $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,categorie,cover,reserve,nbPistes,idAuteur,idCompositeur,idInterprete,genre FROM cd WHERE id=:id');
  $idCD = htmlspecialchars($idCD);
  $query->bindParam(':id', $idCD, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $cd = new CD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['nbPistes'],$curseur['idAuteur'],$curseur['idCompositeur'],$curseur['idInterprete'],$curseur['genre']);
  return $cd;
}

//Retourne le DVD correspondant à l'ID fourni en paramètre
function get_DVD($idDVD){
  include('Model/ConnexionBD.php');
  include_once('Model/Class/Media.class.php');
  include_once('Model/Class/DVD.class.php');
  $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \' %d/%m /%Y\') AS date_parution,idCategorie,cover,reserve,genre,duree,idRealisateur FROM dvd WHERE id=:id');
  $id = htmlspecialchars($idDVD);
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $dvd = new DVD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['genre'],$curseur['duree'],$curseur['idRealisateur']);
  return $dvd;
}

//Retourne le livre correspondant à l'ID fourni en paramètre
function get_livre($idLivre){
  include('Model/ConnexionBD.php');
  include_once('Model/Class/Media.class.php');
  include_once('Model/Class/Livre.class.php');
  $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \' %d/%m /%Y\') AS date_parution,categorie,cover,reserve,idAuteur,resume,type FROM livre WHERE id=:id');
  $idLivre = htmlspecialchars($idLivre);
  $query->bindParam(':id', $idLivre, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $livre = new Livre($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['idAuteur'],$curseur['resume'],$curseur['type']);
  return $livre;
}

//Retourne le media correspondant à l'ID fourni en paramètre et au type
function get_media($idMedia, $typeMedia){
  include('Model/ConnexionBD.php');
  include_once('Model/Class/Media.class.php');
  switch($typeMedia){
    case 'Livre':
    include_once('Model/Class/Livre.class.php');
    $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,idCategorie,cover,reserve,idAuteur,resume,type FROM livre WHERE id=:id');
    $id = htmlspecialchars($idMedia);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $curseur=$query->fetch();
    $Media = new Livre($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['idAuteur'],$curseur['resume'],$curseur['type']);
    break;
    case 'DVD':
    include_once('Model/Class/DVD.class.php');
    $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,idCategorie,cover,reserve,genre,duree,idRealisateur FROM dvd WHERE id=:id');
    $id = htmlspecialchars($idMedia);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $curseur=$query->fetch();
    $Media = new DVD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['genre'],$curseur['duree'],$curseur['idRealisateur']);
    break;
    case 'CD':
    include_once('Model/Class/CD.class.php');
    $query=$bdd->prepare('SELECT id,titre,DATE_FORMAT(date_parution, \'%d/%m/%Y\') AS date_parution,idCategorie,cover,reserve,nbPistes,idAuteur,idCompositeur, idInterprete,genre FROM cd WHERE id=:id');
    $id = htmlspecialchars($idMedia);
    $query->bindParam(':id',$id , PDO::PARAM_INT);
    $query->execute();
    $curseur=$query->fetch();
    $Media = new CD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['nbPistes'],$curseur['idAuteur'],$curseur['idCompositeur'],$curseur['idInterprete'],$curseur['genre']);
    break;
    default://En cas de type incorrect on retourne null
    return null;
    break;
  }
  return $Media;
}

//Retourne une chaîne de caractères contenant le prénom et le nom de l'auteur
function get_auteur($livre){
  include('Model/ConnexionBD.php');
	include_once('Model/Class/Media.class.php');
  include_once('Model/Class/Livre.class.php');
  include_once('Model/Class/CD.class.php');
  $query=$bdd->prepare('SELECT * FROM artiste WHERE id=:id');
  $idAuteur = $livre->getIdAuteur();
  $query->bindParam(':id', $idAuteur, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $auteur = $curseur['prenom']." ".$curseur['nom'];

  return $auteur;

}

//Retourne une chaîne de caractères contenant le prénom et le nom du réalisateur
function get_realisateur($dvd){
  include('Model/ConnexionBD.php');
	include_once('Model/Class/Media.class.php');
  include_once('Model/Class/DVD.class.php');
  $query=$bdd->prepare('SELECT * FROM artiste WHERE id=:id');
  $id= $dvd->getIdRealisateur();
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $realisateur = $curseur['prenom']." ".$curseur['nom'];

  return $realisateur;
}

//Retourne une chaîne de caractères contenant le prénom et le nom du compositeur
function get_compositeur($cd){
  include('Model/ConnexionBD.php');
	include_once('Model/Class/Media.class.php');
  include_once('Model/Class/CD.class.php');
  $query=$bdd->prepare('SELECT * FROM artiste WHERE id=:id');
  $idCompositeur = $cd->getIdCompositeur();
  $query->bindParam(':id', $idCompositeur, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $compositeur = $curseur['prenom']." ".$curseur['nom'];

  return $compositeur;
}

//Retourne une chaîne de caractères contenant le prénom et le nom de l'interprète
function get_interprete($cd){
  include('Model/ConnexionBD.php');
	include_once('Model/Class/Media.class.php');
  include_once('Model/Class/CD.class.php');
  $query=$bdd->prepare('SELECT * FROM artiste WHERE id=:id');
  $idInterprete = $cd->getIdInterprete();
  $query->bindParam(':id',$idInterprete, PDO::PARAM_INT);
  $query->execute();
  $curseur=$query->fetch();
  $interprete = $curseur['prenom']." ".$curseur['nom'];

  return $interprete;
}

//Permet de réserver un média passé en paramètre
function reserver_media($idAdherent, $media){
	include('Model/ConnexionBD.php');
	include_once('Model/Class/Media.class.php');
	include_once('Model/Class/CD.class.php');
	include_once('Model/Class/DVD.class.php');
	include_once('Model/Class/Livre.class.php');
	$type=get_class($media);
	$idMedia=0;
	/*
	switch($type){
		case 'Livre': ...
	
	}
	*/
	$query=$bdd->prepare('SELECT * FROM emprunter WHERE idMedia=:idMedia AND typeMedia=:type');
	$id = $media->getId();
	$query->bindParam(':idMedia', $id, PDO::PARAM_INT);
	$class = get_class($media);
	$query->bindParam(':type', $class, PDO::PARAM_INT);
	$query->execute();
	$curseur=$query->fetch();
	$today=$curseur['dateRetour'];
	
	if (isset($today)){
	
	$query=$bdd->prepare('INSERT INTO reserver VALUES (DEFAULT, :idMedia, :idAdherent, :date, :typeMedia);');
	$query->bindParam(':idMedia', $media->getId(), PDO::PARAM_INT);
	$query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
	$query->bindParam(':date', $today, PDO::PARAM_INT);
	$query->bindParam(':typeMedia', $type, PDO::PARAM_INT);
	$query->execute();
	
	}else{
	
	$query=$bdd->prepare('INSERT INTO reserver VALUES (DEFAULT, :idMedia, :idAdherent, CURRENT_DATE, :typeMedia);');
	$id = $media->getId();
	$query->bindParam(':idMedia', $id, PDO::PARAM_INT);
	$query->bindParam(':idAdherent', $idAdherent, PDO::PARAM_INT);
	//$query->bindParam(':date', $today, PDO::PARAM_INT);
	$query->bindParam(':typeMedia', $type, PDO::PARAM_INT);
	$query->execute();
	
	}

}

//Permet de réserver un média passé en paramètre
function emprunter_media($idAdherent, $media){
    include('Model/ConnexionBD.php');
    include_once('Model/Class/Media.class.php');
    include_once('Model/Class/CD.class.php');
    include_once('Model/Class/DVD.class.php');
    include_once('Model/Class/Livre.class.php');
    $type=get_class($media);
    $idMedia=0;
    /*
    switch($type){
        case 'Livre': ...

    }
    */
    if ($media.getEtat() != "emprunté") {
        $media.changerEtat();
    }


}

//Permet de rechercher un media d'après un mot-clé passé en paramètre
function rechercher_media($keyword){

  include('Model/ConnexionBD.php');
  include_once('Model/Class/Media.class.php');
  include_once('Model/Class/CD.class.php');
  include_once('Model/Class/DVD.class.php');
  include_once('Model/Class/Livre.class.php');

  $keyword='%'.$keyword.'%';

  $query=$bdd->prepare("SELECT * FROM artiste WHERE nom LIKE :keyword OR prenom LIKE :keyword;");
  $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
  $query->execute();
  $id=$query->fetch();

  $query=$bdd->prepare("SELECT * FROM livre WHERE titre LIKE :keyword OR idAuteur=:id;");
  $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
  $query->bindParam(':id', $id['id'], PDO::PARAM_STR);
  $query->execute();
  $tabLivre = array();
  while($curseur=$query->fetch()){
    $tabLivre[]=new Livre($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'], $curseur['reserve'],$curseur['idAuteur'],$curseur['$resume'],$curseur['type']);
  }

  $query=$bdd->prepare("SELECT * FROM cd WHERE titre LIKE :keyword OR idInterprete=:id;");
  $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
  $query->bindParam(':id', $id['id'], PDO::PARAM_STR);
  $query->execute();
  $tabCD=array();
  while($curseur=$query->fetch()){
    $tabCD[]=new CD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['categorie'],$curseur['cover'],$curseur['reserve'],$curseur['nbPistes'],$curseur['idAuteur'],$curseur['idCompositeur'],$curseur['idInterprete'],$curseur['genre']);
  }

  $query=$bdd->prepare("SELECT * FROM dvd WHERE titre LIKE :keyword OR idRealisateur=:id;");
  $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
  $query->bindParam(':id', $id['id'], PDO::PARAM_STR);
  $query->execute();
  $tabDVD=array();
  while($curseur=$query->fetch()){
    $tabDVD[]=new DVD($curseur['id'],$curseur['titre'],$curseur['date_parution'],$curseur['idCategorie'],$curseur['cover'],$curseur['reserve'],$curseur['genre'],$curseur['duree'],$curseur['idRealisateur']);
  }

  $tabMedia=array_merge($tabCD,$tabDVD,$tabLivre);
  return $tabMedia;

}


//Fonction en cours d'implémentation

/*function rechercher_media($titre, $typeMedia=NULL, $categorie=NULL){

	}
}*/

?>
