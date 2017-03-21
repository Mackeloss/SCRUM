<?php include('header.php') ?>
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 21/03/2017
 * Time: 16:12
 */

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

<?php include('footer.php') ?>