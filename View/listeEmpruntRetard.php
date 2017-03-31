<?php

include('header.php');
include('menu.php');
?>
    <div class="col-lg-12" id="titreMonEspace">
        <h2>Liste Emprunt Retard</h2>
    </div>
<br/>
<br/>
    <div class="row">
        <table align='center' border='2'>
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
    </br></br>

<?php
include('footer.php');

?>