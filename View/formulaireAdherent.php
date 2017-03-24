<?php include('header.php');
include('menu.php');?>

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

    <form class="form-horizontal" role="form" method="post" action="site.php?section=adherent&action=inscription">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label col-sm-offset-1">Nom d'utilisateur</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'Utilisateur">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label col-sm-offset-1">Adresse mail</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" onBlur="verifMail(this)" id="email" name="email" placeholder="exemple@domaine.com">
            </div>
        </div>
        <div class="form-group">
            <label for="mdp" class="col-sm-2 control-label col-sm-offset-1">Mot de Passe</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="mdp" name="mdp">
            </div>
        </div>
        <div class="form-group">
            <label for="prenom" class="col-sm-2 control-label col-sm-offset-1">Prénom</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            </div>
            <label for="nom" class="col-sm-2 control-label col-sm-offset-1">Nom</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
        </div>
        <div class="form-group">
            <label for="adresse" class="col-sm-2 control-label col-sm-offset-1">Adresse</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="adresse" name="adresse">
            </div>
        </div>
        <div class="form-group">
            <label for="dateNaissance" class="col-sm-2 control-label col-sm-offset-1">Date de Naissance</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" id="dateNaissance" name="dateNaissance">
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

<?php include('footer.php') ?>