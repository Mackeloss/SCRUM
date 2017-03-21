<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
	<title>GestMedia</title>
    <link href="View/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="View/style.css" rel="stylesheet">
  </head>
  <body>
		<!-- Bandeau Sup -->
		<header class="col-lg-12" id="head">
			<?php
			if(!isset($_SESSION['adherent'])){ ?>
				<form class="form-inline" method="post" action="./Model/formConnexion.php">
					<div class="row" id="idmdp">
					<input class="form-control input-sm" type="text" placeholder="Nom d'utilisateur" name="login">
					<input class="form-control input-sm" type="password" placeholder="Mot de passe" name="pass">
					</div>
					<div class="row" id="cbbutt">
							<input class="form-control" type="checkbox" name="remember"/> Se rappeler de moi
							<input class="btn btn-default input-sm" type="submit" name="Envoyer" value="Connexion"/>
					</div>
				
        <?php
				if(isset($_GET['error'])){
					echo "<p><strong>".htmlspecialchars($_GET['error'])."</strong></p>";
				}
			}else{
				echo 'Vous êtes connecté en tant que '.$_SESSION['adherent']->getPrenom().' '.$_SESSION['adherent']->getNom().'<br/><a href="../Model/deconnexion.php">Se déconnecter</a>';
			}
			?>
			</form>
		</header>
		<div class="container-fluid">
