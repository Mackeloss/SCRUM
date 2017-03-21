  <?php
   include('header.php');
   include('menu.php');
   ?>
		  <!-- CORPS DU SITE -->
		  <br/>
		 <div class="row">

			 <div class="col-lg-offset-2 col-lg-8">
				<h2>CATALOGUE DE MEDIAS</h2>
			</div>
		</div>

		<div class="row" id="cadreCat">

			<div class="col-lg-offset-3 col-lg-6">

				<div class="row">
					<form name="selectType" action="site.php?section=catalogue&action=rechercher" method="POST">
    						<!--<div class="checkbox checkbox-success"><br>
									<input type="checkbox" name="format" value="CD"> CD
									<br/>
									<input type="checkbox" name="format" value="DVD" > DVD
									<br/>
									<input type="checkbox" name="format" value="Livre"> Livres
								</div> -->
    			</div>

    		</div>
				<!--
    			<div class=" col-lg-4">
    				<div class="row">
    					<br/><br/><h4>Catégorie :</h4>
    				</div>
    				<div class="row">
    						<div class="checkbox checkbox-success"><br>
    							<input type="checkbox" name="categorie" value="scifi"> Science-Fiction
    							<br/>
    							<input type="checkbox" name="categorie" value="drame" > Drame
    							</br>
    							<input type="checkbox" name="categorie" value="action"> Action
    							<br/>
    							<input type="checkbox" name="categorie" value="aventure"> Aventure
    						</div>

    				</div>

    			</div>-->
    		
    		<br/>
    		<br/>
    		<div class="row">
    						<div class="form-group">
    							<div class="col-lg-offset-4 col-lg-4" id='rechbut'>
    							  <input type="search" name="keyword" class="input-sm form-control" placeholder="Recherche">
    							  <button type="submit" name="rechercher" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
    							</div>
    						</div>
    		</div>
      </form>
    <div class="col-lg-offset-3 col-lg-6">
		<hr/ id="bluetrait">
	</div>
		<div class="row">
			<div class="col-lg-offset-1 col-lg-3">
				<br/><h4>Résultats de la recherche : <br/></h4>
				<br/>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<table align='center' border='2' >
					<tr><th>Média</th><th>Catégorie</th><th>Date</th><th>Image</th><th>Etat</th></tr>
				<?php


				foreach ($tabMedia as $media) {
					echo "<tr><td><a href=\"site.php?section=media&action=consulter&idMedia=".$media->getId()."&typeMedia=".get_class($media)."\" </a>".$media->getTitre()."</a></td><td>".get_class($media)."</td><td>".$media->getDate_parution()."</td><td><img src=\"".$media->getCover()."\" /></td><td>".$media->getEtat().'</td></tr>';
				}
					?>
				</table>
			</div>
		</div>
		
		</div>
		<br/>
		</br>

		<!--<div class="row">
			<div class="col-sm-offset-4 col-sm-4">
			  <ul class="pagination">
				<li><a href="#">&laquo;</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">&raquo;</a></li>
			  </ul>
			</div>
		</div>-->

	<br/>
		</br>




<?php include('footer.php');?>
