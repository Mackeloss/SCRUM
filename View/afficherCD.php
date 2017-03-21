   <?php
   include('header.php');
   include('menu.php');
   ?>

    <!-- CORPS DU SITE -->
		<div class="row">
			<div class="col-lg-offset-2 col-lg-4" id="titreMedia">
				<h2><?php echo ($cd->getTitre()); ?></h2>
			</div>
			<br/>
		</div>
		<div class="row" >
			<div class="col-lg-offset-3 col-lg-5 col-lg-offset-4" id="cadreMedia">

				<div class="col-lg-offset-1 col-lg-5">

						<div class="row">
							<div class="col-lg-11">
								<?php echo ("<b>Interprète</b> : ".$interprete."<br/>");   ?>
								<?php echo ("<b>Genre</b> : ".$cd->getGenre()."<br/>");   ?>
								<?php echo ("<b>Nombre de pistes</b> : ".$cd->getNbPistes()."<br/>");   ?>
								<?php echo ("<b>Auteur</b> : ".$auteur."<br/>");   ?>
								<?php echo ("<b>Compositeur</b> : ".$compositeur."<br/>");   ?>
								<?php echo ("<b>Date de parution</b> : ".$cd->getDate_parution()."<br/>");   ?>
								
								<?php if ($cd->getEtat()=="disponible"){
										echo ('<b>Statut actuel : <p id="dispo">'.$cd->getEtat()."</p></b><br/>");   
									}else {
										echo ('<b>Statut actuel : <p id="indispo">'.$cd->getEtat()."</p></b><br/>");  
									}  ?>
								
								<hr/ id="whitetrait">
							</div>
						</div>
						
						
						
				</div>
				<div class="col-lg-5 col-lg-offset-1 ">

							<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1"><br/>
								<?php echo '<img src="'.$cd->getCover().'" id="imageMedia"/>';   ?>
								<br/><br/><br/>
							</div>

				</div>
				<div class="row" >
							<div class="col-lg-offset-8 col-lg-2  ">
								<?php
										echo('<a href="site.php?section=catalogue&action=reserver&idMedia='.$cd->getId().'&typeMedia='.get_class($cd).'"><button class="btn btn-primary">Réserver</button></a><br/><br/>');
									
								?>

								
							</div>
						</div>
			</div>
		</div>
		</br></br></br>
		<div class="row" >
			<div class="col-lg-offset-8 col-lg-2  ">
				<a href="\site.php?section=catalogue"><i class="glyphicon glyphicon-share-alt"><b>  Retour au catalogue</b></i></a>
			</div>
		</div>
		</br></br></br>

<?php include('footer.php');?>