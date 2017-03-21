<?php include('header.php') ?>

<script>
function verifMail(champ)
{
  var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
  if(!regex.test(champ.value))
  {
    surligne(champ, true);
    return false;
  }
  else
  {
    surligne(champ, false);
    return true;
  }
}

function verifCaptcha(champ)
{
  if(champ.value != 5)
  {
    surligne(champ, true);
    return false;
  }
  else
  {
    surligne(champ, false);
    return true;
  }
}

function surligne(champ, erreur)
{
  if(erreur)
    champ.style.backgroundColor = "#fba";
  else
    champ.style.backgroundColor = "#3AF24B";
}
</script>
<?php include('menu.php'); ?>

<?php if(isset($_SESSION['adherent'])){ ?>
<!-- Formulaire de contact si l'utilisateur est connecté -->
<form class="form-horizontal" role="form" method="post" action="site.php?section=contact&action=envoyer">
    <div class="form-group">
        <label for="nom" class="col-sm-2 control-label col-sm-offset-1">Nom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom et prénom" value="<?php echo $_SESSION['adherent']->getPrenom().' '.$_SESSION['adherent']->getNom(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label col-sm-offset-1">Adresse mail</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" onBlur="verifMail(this)" id="email" name="email" placeholder="exemple@domaine.com" value="<?php echo $_SESSION['adherent']->getMail(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label col-sm-offset-1">Message</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="4" name="message"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="human" class="col-sm-2 control-label col-sm-offset-1">2 + 3 = ?</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" onBlur="verifCaptcha(this)" id="human" name="human" placeholder="Votre réponse">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
    </div>
</form>

<!-- Formulaire de contact si l'utilisateur n'est pas connecté -->
<?php }else{ ?>
  <form class="form-horizontal" role="form" method="post" action="site.php?section=contact&action=envoyer">
    <div class="form-group">
        <label for="nom" class="col-sm-2 control-label col-sm-offset-1">Nom</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom et prénom">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label col-sm-offset-1">Adresse mail</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" onBlur="verifMail(this)" id="email" name="email" placeholder="exemple@domaine.com">
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label col-sm-offset-1">Message</label>
        <div class="col-sm-6">
            <textarea class="form-control" rows="4" name="message"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="human" class="col-sm-2 control-label col-sm-offset-1">2 + 3 = ?</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" onBlur="verifCaptcha(this)" id="human" name="human" placeholder="Votre réponse">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
    </div>
</form>
<?php }
if(isset($msg)){
  echo "<h3>$msg</h3>";
}
include('footer.php');
?>
