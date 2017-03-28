<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 28/03/2017
 * Time: 08:16
 */
include('header.php');
include('menu.php');

?>
<div id="rechercherUtilisateur">
    <form class="form-horizontal" role="form" method="post" action="site.php?section=creerEmprunt&action=rechercheUtilisateur">
        <div class="form-group">
                <label for="username" class="col-sm-2 control-label col-sm-offset-1">Nom d'utilisateur</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'Utilisateur">
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<div id="selectionnerUtilisateur">
    <table align='center' border='2' >
        <tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Action</th></tr>
        <?php
        foreach ($tabUtilisateur as $utilisateur) {
            echo "<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                 </tr>";
        }
        ?>
    </table>
</div>

<div id="rechercherMedia">
    <form class="form-horizontal" role="form" method="post" action="site.php?section=creerEmprunt&action=rechercheMedia">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label col-sm-offset-1">Nom d'utilisateur</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="media" name="media" placeholder="Nom du média">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3">
                <input id="submit" name="submit" type="submit" value="Envoyer" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<div id="selectionnerMedia">
    <table align='center' border='2' >
        <tr><th>Catégorie</th><th>Titre</th><th>Genre</th><th>Action</th></tr>
        <?php
        foreach ($tabMedia as $media) {
            echo "<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                 </tr>";
        }
        ?>
    </table>
</div>
<?php
include('footer.php');
?>
