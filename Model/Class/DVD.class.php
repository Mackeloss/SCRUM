<?php
/* DVD.class.php
*
* Décrit l'objet DVD qui étend Media
*
*/
class DVD extends Media{

    private $genre;
    private $duree;
    private $idRealisateur;

    function __construct($id,$titre,$date_parution,$categorie,$cover,$etat,$genre,$duree,$idRealisateur)
    {
      $this->id = $id;
      $this->titre = $titre;
      $this->date_parution = $date_parution;
      $this->categorie = $categorie;
      $this->cover = $cover;
      if($etat==0){
		$this->etat = "disponible";
	  }else{
		$this->etat = "indisponible";
	  }
      $this->genre = $genre;
      $this->duree = $duree;
      $this->idRealisateur = $idRealisateur;
    }

    	public function getGenre(){
		return $this->genre;
	}

	public function setGenre($genre){
		$this->genre = $genre;
	}

	public function getDuree(){
		return $this->duree;
	}

	public function setDuree($duree){
		$this->duree = $duree;
	}

	public function getIdRealisateur(){
		return $this->idRealisateur;
	}

	public function setIdRealisateur($idRealisateur){
		$this->idRealisateur = $idRealisateur;
	}

	public function setDisponible(){
		$this->etat = "disponible";
	}

    public function setIndisponible(){
		$this->etat = "indisponible";
	}

  }
 ?>
