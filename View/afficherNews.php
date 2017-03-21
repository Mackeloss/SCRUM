  <?php
   include('header.php');
   include('menu.php');
   ?>
		  <!-- CORPS DU SITE -->
		<div class="row">
			<div class="col-lg-offset-1 col-lg-6">
				<div class="news">
					<div class="row">
						<div class="col-lg-6" id="titreNews" ><b>
							<?php echo ($news->getTitre());   ?>
						</b></div>
					</div>
					<div class="row">
						<div class="col-lg-offset-1 col-lg-2" id="imageNews">
							<?php echo '<img src="'.$news->getCover().'" />';   ?>
						</div>
						<div class="col-lg-offset-1 col-lg-7 col-lg-offset-1" id="contenuNews">
							<?php echo($news->getContenu());   ?>
						</div>
					</div>
					<hr/ id="bluetrait">
					<div class="row">
						<div class="col-lg-offset-6 col-lg-6">
							<?php echo("Ecrit par ".$news->getAuteur()." le ");
								echo($news->getDate());	?>
						</div>
					</div>

				</div>
			</div>
		</div>
		</br></br>

<?php include('footer.php');?>
