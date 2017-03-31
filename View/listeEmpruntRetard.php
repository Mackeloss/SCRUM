<?php

include('header.php');
include('menu.php');
?>
    <div class="col-lg-12" id="titreMonEspace">
        <h2>Liste Emprunt Retard</h2>
    </div>

    <div class="row">
        <div class="col-lg-offset-1 col-lg-6">
            <table>
                <tr>
                    <td>Adherent</td>
                    <td>Titre</td>
                    <td>Type du média</td>
                    <td>Date emprunt</td>
                </tr>
                <?php
                foreach ($emprunts as $emprunt) {
                    echo "<tr>
        <td>" . $emprunt['nom'] . " ". $emprunt['prenom']."</td>
        <td>" . $emprunt['titre'] . "</td>
        <td>" . $emprunt['typeMedia'] . "</td>
        <td>" . $emprunt['dateEmprunt'] . "</td>
    </tr>";
                }
                ?>

            </table>
        </div>
    </div>
    </br></br>

<?php
include('footer.php');

?>