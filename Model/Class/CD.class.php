<?php
/* CD.class.php
*
* Décrit l'objet CD qui étend Media
*
*/
class CD extends Media{


    private $nbPistes;
    private $idAuteur;
    private $idCompositeur;
    private $idInterprete;
    private $genre;

    function __construct($id,$titre,$date_parution,$categorie,$cover,$etat,$nbPistes,$idAuteur,$idCompositeur,$idInterprete,$genre)
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
      $this->nbPistes = $nbPistes;
      $this->idAuteur = $idAuteur;
      $this->idCompositeur = $idCompositeur;
      $this->idInterprete = $idInterprete;
      $this->genre = $genre;
    }

	public function getNbPistes(){
		return $this->nbPistes;
	}

	public function setNbPistes($nbPistes){
		$this->nbPistes = $nbPistes;
	}

	public function getIdAuteur(){
		return $this->idAuteur;
	}

	public function setIdAuteur($idAuteur){
		$this->idAuteur = $idAuteur;
	}

	public function getIdCompositeur(){
		return $this->idCompositeur;
	}

	public function setIdCompositeur($idCompositeur){
		$this->idCompositeur = $idCompositeur;
	}

	public function getIdInterprete(){
		return $this->idInterprete;
	}

	public function setIdInterprete($idInterprete){
		$this->idInterprete = $idInterprete;
	}

	public function getGenre(){
		return $this->genre;
	}

	public function setGenre($genre){
		$this->genre = $genre;
	}

	public function setDisponible(){
		$this->etat = "disponible";
	}

    public function setIndisponible(){
		$this->etat = "indisponible";
	}



  }
 ?>
