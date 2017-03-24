<?php
//index.php
//Fait office de routeur qui va construire la page web en fonction de l'URL fournie

include("Model/Class/Adherent.class.php");
session_start();

//Si la section est envoyée par l'URL
if(isset($_GET['section'])){
  switch($_GET['section']){

    //Page d'accueil
    case 'index':
      require_once('Controller/index.php');
    break;

    //Consultation des news
    case 'consulter-news':
      if(isset($_GET['id'])){
        require_once('Controller/afficherNews.php');
      }else{
        require_once('Controller/index.php');
      }
    break;

    //Accès à l'espace adhérent
    case 'monespace':
    if(isset($_GET['action'])){
      switch($_GET['action']){
        //Annuler une réservation
        case 'supprimerReservation':
          if(isset($_GET['idReservation'])){
            require_once('Controller/supprimerReservation.php');
          }else{//Si pas d'ID, on affiche une erreur
            $msg="Une erreur est survenue, veuillez réessayer";
            include('Controller/pageErreur.php');
          }
        break;
        case 'renouvelerEmprunt':
          if(isset($_GET['idEmprunt'])){
            require_once('Controller/renouvelerEmprunt.php');
          }else{
            $msg="Une erreur est survenue, veuillez réessayer";
            include('Controller/pageErreur.php');
          }
        break;
        default://Par défaut on affiche l'espace de l'adhérent
        if(isset($_SESSION['adherent'])){
          require_once('Controller/monEspace.php');
        }else{
          $msg="Vous devez être connecté pour accèder à votre espace";
          include('Controller/pageErreur.php');
        }
        break;
      }
    }else{//Par défaut on affiche l'espace de l'adhérent
      if(isset($_SESSION['adherent'])){
        require_once('Controller/monEspace.php');
      }else{//S'il n'est pas connecté on affiche une erreur
        $msg="Vous devez être connecté pour accèder à votre espace";
        include('Controller/pageErreur.php');
      }
    }
    break;

    case 'ajoutAdherent':
        if (isset($_GET['ajouter'])) {
            require_once('Controller/inscrireAdherent.php');
        }
    break;

    //Consultation du catalogue
    case 'catalogue':
      if(isset($_GET['action'])){
        switch($_GET['action']){

          //Réservation d'un média
          case 'reserver':
          if(isset($_SESSION['adherent'])){
            if(isset($_GET['idMedia']) && isset($_GET['typeMedia'])){
              require_once('Controller/reserverArticle.php');
            }else{//Si requête modifiée, on affiche une erreur
              $msg="Une erreur est survenue, veuillez réessayer";
              include('Controller/pageErreur.php');
            }
          }else{//S'il n'est pas connecté on affiche une erreur
            $msg="Vous devez être connecté pour réserver un ouvrage.";
            include('Controller/pageErreur.php');
          }
          break;
          //Effectuer une recherche dans le catalogue
          case 'rechercher':
            if(isset($_POST['rechercher'])){
              if(isset($_POST['keyword'])){//Si le formulaire est bien rempli on effectue la recherche
                require_once('Controller/rechercher.php');
              }else{//Sinon on affiche une erreur
                $msg="Vous devez remplir le champ pour effectuer une recherche.";
                include('Controller/pageErreur.php');
              }
            }else{
              $msg="Une erreur est survenue, veuillez réessayer";
              include('Controller/pageErreur.php');
            }
          break;
        }
      }else{//Par défaut on affiche le catalogue
          require_once('Controller/afficherCatalogue.php');
      }
    break;

    //Consultation d'un media
    case 'media':
      if(isset($_GET['action'])){
        switch($_GET['action']){
          //Affichage d'un média
          case 'consulter':
            if(isset($_GET['idMedia']) && isset($_GET['typeMedia'])){
              require_once('Controller/afficherMedia.php');
            }else{//Si la requête est modifiée ou incomplète on affiche une erreur
              $msg="Une erreur est survenue, veuillez réessayer";
              include('Controller/pageErreur.php');
            }
          break;
      }
    }
    break;

    //Formulaire de contact
    case 'contact':
    //Si le formulaire a été soumis, on envoie le message
      if(isset($_GET['action']) && $_GET['action']=='envoyer'){
        if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['human']) && isset($_POST['message']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) && $_POST['human']==5){
          require_once('Controller/envoyerMessage.php');
        }else{
          $msg="Une erreur est survenue. Assurez-vous d'avoir bien rempli tous les champs.";
          require_once('Controller/afficherFormContact.php');
        }
      }else{ //Sinon on affiche le formulaire
        require_once('Controller/afficherFormContact.php');
      }
    break;

    //Affichage de la page d'accueil par défaut
    default:
      require_once('Controller/index.php');
    break;
  }
}else{ //Sinon on redirige vers la page d'accueil
  require_once('Controller/index.php');
}
