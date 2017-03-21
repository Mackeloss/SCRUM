<?php include('header.php');
include('menu.php');?>



    <!-- PRETS -->
		<div class="col-lg-12" id="titreMonEspace">
			<h2>Mon espace</h2>

		</div>
		<div class="col-lg-offset-1 col-lg-3">
			<strong>Mes prêts en cours</strong></br>
		</div>


		<?php
		echo "<div class=\"col-lg-offset-3 col-lg-6\">";
		if (!empty($tabEmprunts)){

			echo "	<table align='center' border='2' >";
			echo "		<tr><th>Média</th><th>Date d'emprunt</th><th>Retour d'emprunt</th><th>Renouveler l'emprunt</th></tr>";
			foreach ($tabEmprunts as $emprunt) {
				echo "<tr><td><a href=\"site.php?section=media&action=consulter&idMedia=".$emprunt[0]->getId()."&typeMedia=".get_class($emprunt[0])."\">".$emprunt[0]->getTitre()."</a></td><td>".$emprunt[1]."</td><td>".$emprunt[3]."</td><td><a href=\"site.php?section=monespace&action=renouvelerEmprunt&idEmprunt=".$emprunt[2]."\"><i class=\"glyphicon glyphicon-refresh\"></i></a></td></tr>";
			}

			echo "<br/> <br/> </table>" ;
		}
		else {
			echo " Vous n'avez aucun emprunt en cours " ;

		}
		?>
		</div>





		<!-- RESERVATION-->
		<div class="col-lg-offset-1 col-lg-3">
			<br/><strong>Mes réservations</strong></br><br/>
		</div>

		<?php
		echo "<div class=\"col-lg-offset-3 col-lg-6\">";
		if (!empty($tabReservations)){
			echo "<table align='center' border='2' >";
			echo "	<tr><th>Média</th><th>Réservé à partir du</th></tr>" ;
		 foreach ($tabReservations as $reservation) {
						echo "<tr><td><a href=\"site.php?section=media&action=consulter&idMedia=".$reservation[0]->getId()."&typeMedia=".get_class($reservation[0])."\">".$reservation[0]->getTitre()."</a></td><td>".$reservation[1]."</td><td><a href=\"site.php?section=monespace&action=supprimerReservation&idReservation=".$reservation[2]."\"><i class=\"glyphicon glyphicon-remove\"></i></a></td></tr>";
					}

		echo "	</table> ";


		}
		else {
			echo " Vous n'avez aucune réservation " ;

			}
		?>
		<br/><br/>
		</div>
<?php include('footer.php'); ?>
