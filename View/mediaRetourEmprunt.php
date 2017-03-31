<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 31/03/2017
 * Time: 16:20
 */

include('header.php');
include('menu.php');

?>
    <div class="row">

        <div class="col-lg-offset-2 col-lg-8">
            <h2>Enregistrer un retour d'mprunt</h2>
        </div>
    </div>

<?php if($etape == 1){?>
    <div id="rechercherUtilisateur">
        <h3>Rechercher un utilisateur</h3>
        <form class="form-horizontal" role="form" method="post" action="site.php?section=retourEmprunt&action=rechercheUtilisateur">
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
<?php }elseif($etape == 2){?>
    <div id="selectionnerUtilisateur">
        <h3>Selectionner un utilisateur</h3>
        <table align='center' border='2' >
            <tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Action</th></tr>
            <?php
            foreach ($tabUtilisateur as $utilisateur) {
                echo "<tr>
                    <td>".$utilisateur['nom']."</td>
                    <td>".$utilisateur['prenom']."</td>
                    <td>".$utilisateur['dateNaissance']."</td>
                    <td><a href='site.php?section=retourEmprunt&action=selectionUtilisateur&user=".$utilisateur['id']."'>Choisir</a></td>
                 </tr>";
            }
            ?>
        </table>
    </div>
<?php }elseif($etape == 3){?>
    <div id="selectionnerMedia">
        <h3>Valider un retour d'emprunt</h3>
        <table align='center' border='2' >
            <tr><th>Catégorie</th><th>Titre</th><th>Genre</th><th>Action</th></tr>
            <?php
            foreach ($tabMedia as $media) {
                echo "<tr>
                    <td>".$media['categorie']."</td>
                    <td>".$media['titre']."</td>
                    <td>".$media['genre']."</td>
                    <td><a href='site.php?section=retourEmprunt&action=selectionMedia&user=".$user."&type=".$media['categorie']."&media=".$media['id']."'>Retour emprunt</a></td>
                 </tr>";
            }
            ?>
        </table>
    </div>
<?php }?>
<?php
include('footer.php');
?>