<?php
/* News.class.php
*
* Décrit l'objet News
*
*/
class News{
  private $id;
  private $titre;
  private $contenu;
  private $cover;
  private $date;
  private $auteur;

  public function __construct($id, $titre, $contenu, $cover,$auteur, $date){
    $this->id = $id;
    $this->titre = $titre;
    $this->contenu = $contenu;
    $this->cover = $cover;
    $this->date = $date;
	$this->auteur = $auteur;
  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getTitre(){
    return $this->titre;
  }

  public function setTitre($titre){
    $this->titre = $titre;
  }

  public function getContenu(){
    return $this->contenu;
  }

  public function setContenu($contenu){
    $this->contenu = $contenu;
  }

  public function getDate(){
    return $this->date;
  }

  public function setDate($date){
    $this->date = $date;
  }

  public function getCover(){
    return $this->cover;
  }

  public function setCover($cover){
    $this->cover = $cover;
  }

    public function getAuteur(){
    return $this->auteur;
  }

  public function setAuteur($auteur){
    $this->auteur = $auteur;
  }

}
?>
