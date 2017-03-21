   <?php
   include('header.php');
   include('menu.php');
   ?>
   
    <!-- CORPS DU SITE -->
		
		<div class="col-lg-12" id="titreMonEspace">
			<h2><?php echo ($media->getTitre()); ?></h2>
		</div>
		
		<div class="row">
			<div class="col-lg-offset-1 col-lg-6">
				<div class="detail">
					<div class="row">
						<div class="col-lg-6" id="titreNews" ><b>
							<?php echo ("Réalisé par : ".$media->getAuteur()."<br/><br/>");   ?> 				<!-- WARNING TO DO -->
							<?php echo ("Date de parution : ".$media->getDate_parution()."<br/><br/>");   ?>
						</b></div>
					</div>
					<div class="row">
						<div class="col-lg-offset-1 col-lg-7 col-lg-offset-1" id="contenuNews">
							<?php echo($media->getContenu());   ?> 					<!-- WARNING TO DO -->
						</div>
						<div class="col-lg-offset-1 col-lg-2" id="imageNews">
							<?php echo '<img src="'.$media->getCover().'" />';   ?>
						</div>
						
					</div>
					<hr/ id="bluetrait">
					<div class="row">
						<div class="col-lg-offset-6 col-lg-6">
							<?php echo("Ecrit par ".$media->getAuteur()." le ");?>
						</div>
					</div>

				</div>
			</div>
		</div>
		</br></br>
   
   
   
   
   
   
   		

<?php include('footer.php');?>
