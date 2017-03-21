<?php
/* Avis.class.php
*
* Décrit l'objet Avis
*
*/
class Avis{
  private $id;
  private $idArticle;
  private $idAdherent;
  private $note;
  private $critique;
  private $date;

  /*Constructeur avec critique*/
  public function __construct($id, $idArticle, $idAdherent, $note, $critique, $date){
    $this->id = $id;
    $this->idArticle = $idArticle;
    $this->idAdherent = $idAdherent;
    $this->note = $note;
    $this->critique = $critique;
    $this->date = $date;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getIdArticle(){
    return $this->idArticle;
  }

  public function setIdArticle($idArticle){
    $this->idArticle = $idArticle;
  }

  public function getIdAdherent(){
    return $this->idAdherent;
  }

  public function setIdAdherent($idAdherent){
    $this->idAdherent = $idAdherent;
  }

  public function getNote(){
    return $this->note;
  }

  public function setNote($note){
    $this->note = $note;
  }

  public function getCritique(){
    return $this->critique;
  }

  public function setCritique($critique){
    $this->critique = $critique;
  }

  public function getDate(){
    return $this->date;
  }

  public function setDate($date){
    $this->date = $date;
  }
}
?>
