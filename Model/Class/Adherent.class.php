<?php
/* Adherent.class.php
*
* Décrit l'objet Adherent
*
*/

class Adherent{
  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $adresse;
  private $tel;
  private $dateNaissance;
  private $dateInscription;

  public function __construct($id, $nom, $prenom, $mail, $adresse, $tel, $dateNaissance, $dateInscription){
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->adresse = $adresse;
    $this->tel = $tel;
    $this->dateNaissance = $dateNaissance;
    $this->dateInscription = $dateInscription;
  }

  public function getId(){
    return $this->id;
  }

  public function getNom(){
    return $this->nom;
  }

  public function getPrenom(){
    return $this->prenom;
  }

  public function getMail(){
    return $this->mail;
  }

  public function getAdresse(){
    return $this->adresse;
  }

  public function getTel(){
    return $this->tel;
  }

  public function getDateNaissance(){
    return $this->dateNaissance;
  }

  public function getDateInscription(){
    return $this->dateInscription;
  }

  public function setId($param){
    $this->id = $param;
  }

  public function setNom($param){
    $this->nom = $param;
  }

  public function setPrenom($param){
    $this->prenom = $param;
  }

  public function setMail($param){
    $this->mail = $param;
  }

  public function setAdresse($param){
    $this->adresse = $param;
  }

  public function setTel($param){
    $this->tel = $param;
  }

  public function setDateNaissance($param){
    $this->dateNaissance = $param;
  }

  public function setDateInscription($param){
    $this->dateInscription = $param;
  }
}

 ?>
