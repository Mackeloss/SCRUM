<?php
session_start();
if(isset($_POST['login']) && isset($_POST['pass'])){
  include('ConnexionBD.php');
  $pass_hache = sha1($_POST['pass']);
  $req = $bdd->prepare('SELECT COUNT(*) FROM adherent WHERE login=:login AND pass=:pass');
  $req->bindParam(':login',$_POST['login'],PDO::PARAM_STR);
  $req->bindParam(':pass',$pass_hache,PDO::PARAM_STR, 40);
  $req->execute();
  $user_id = $req->fetchColumn();
  if($user_id == false){
    header('Location: ../site.php?error=Nom d\'utilisateur et/ou mot de passe incorrects');
  } else{
    include("Class/Adherent.class.php");
    $req2 = $bdd->prepare('SELECT * FROM adherent WHERE login=:login AND pass=:pass');
    $req2->bindParam(':login',$_POST['login'],PDO::PARAM_STR);
    $req2->bindParam(':pass',$pass_hache,PDO::PARAM_STR, 40);
    $req2->execute();
    $adherent=$req2->fetch();
    $_SESSION['adherent'] = new Adherent ($adherent['id'],$adherent['nom'],$adherent['prenom'],$adherent['mail'],$adherent['adresse'],$adherent['tel'],$adherent['dateNaissance'],$adherent['dateInscription']);
    //$_SESSION['identifie'] = $_POST['login'];
    if(isset($_POST['remember'])){
      setcookie('login', $_POST['login'], time() + 365*24*3600, null, null, false, true);
    }
    header('Location: ../site.php');
   }
} else{
  header('Location: ../site.php?error=Vous devez remplir les deux champs');
}
?>