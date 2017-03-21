<?php
/* Media.class.php
*
* Classe abstraite qui regroupe tous les types de média de la médiathèque
*
*/
abstract class Media
{
  protected $id;
  protected $titre;
  protected $date_parution;
  protected $categorie;
  protected $cover;
  protected $etat;


  public function getId(){
    return $this->id;
  }

  public function setId($nouvelleId){
    $this->id = $nouvelleId;
  }
  public function getTitre()
    {
        return $this->titre;
    }

  public function setTitre($nouveauTitre)
    {
        $this->titre = $nouveauTitre;
    }

    public function getCategorie()
      {
          return $this->categorie;
      }

    public function setCategorie($nouvelleCate)
      {
          $this->categorie = $nouvelleCate;
      }

  public function getDate_parution()
    {
        return $this->date_parution;
    }

  public function setDate_parution($nouvelleDate)
    {
        $this->date_parution = $nouvelleDate;
    }

  public function getCover()
    {
        return $this->cover;
    }

  public function setCover($nouvelleCover)
    {
        $this->cover = $nouvelleCover;
    }

  public function getEtat()
    {
          return $this->etat;
    }

  public function changerEtat()
    {
        if($this->etat == "disponible"){
          $this->etat="emprunté";
        } else{
          $this->etat = "disponible";
        }
    }

}
?>
