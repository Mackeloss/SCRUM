<?php
/* Livre.class.php
*
* Décrit l'objet Livre qui étend Media
*
*/
class Livre extends Media{

    private $idAuteur;
    private $resume;
    private $type;

    function __construct($id,$titre,$date_parution,$categorie,$cover,$etat,$idAuteur,$resume,$type)
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
      $this->idAuteur = $idAuteur;
      $this->resume = $resume;
      $this->type = $type;
    }

    public function getIdAuteur()
      {
          return $this->idAuteur;
      }

    public function setIdAuteur($nouvelId)
      {
          $this->idAuteur = $nouvelId;
      }

    public function getResume()
      {
          return $this->resume;
      }

    public function setResume($nouveauResume)
      {
          $this->resume = $nouveauResume;
      }
    public function getType()
      {
          return $this->type;
      }

    public function setType($nouveauType)
      {
          $this->type = $nouveauType;
      }

    public function setDisponible(){
		$this->etat = "disponible";
	}

    public function setIndisponible(){
		$this->etat = "indisponible";
	}

  }
 ?>
