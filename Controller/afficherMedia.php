<?php
//Affiche le détail d'un média selon son type
  include('Model/ConnexionBD.php');
  include_once('Model/OperationsMedia.php');
  switch($_GET['typeMedia']){
    case 'Livre':
      $livre = get_livre(htmlentities($_GET['idMedia']));
      $auteur = get_auteur($livre);
      include('View/afficherLivre.php');
    break;
    case 'DVD':
      $dvd = get_DVD(htmlentities($_GET['idMedia']));
      $realisateur = get_realisateur($dvd);
      include('View/afficherDVD.php');
    break;
    case 'CD':
      $cd = get_CD(htmlentities($_GET['idMedia']));
      $auteur = get_auteur($cd);
      $compositeur = get_compositeur($cd);
      $interprete = get_interprete($cd);
      include('View/afficherCD.php');
    break;
    default:
      $msg = "Type de média non reconnu.";
      include('View/pageErreur.php');
    break;
  }
?>
