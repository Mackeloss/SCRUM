<?php include('header.php');
include('menu.php');?>


    <!-- CORPS DU SITE -->
  <div class="row" style="margin-top : 15px;">
    <!-- Liste des news -->
    <div class="col-lg-offset-3 col-lg-6">
  		<?php foreach ($tabNews as $news) { ?>
  		<a href="http://gestmedia.shost.ca/site.php?section=consulter-news&id=<?php echo $news->getId(); ?>">
        <!--<a href="http://localhost/Mediatheque%20-%20Copie/site.php?section=consulter-news&id=<?php echo $news->getId(); ?>">-->
          <div class="news"  height="120px">
  				<div class="row">
  					<div class="col-lg-offset-2 col-lg-6" id="titreNews" ><b>
  						<?php echo $news->getTitre();   ?>
  					</b></div>
  				</div>
  				<div class="row">
  					<div class="col-lg-3" id="imageNews">
  						<?php echo '<img src="'.$news->getCover().'" />';   ?>
  					</div>
  					<div class="col-lg-offset-1 col-lg-7 col-lg-offset-1" id="contenuNews">
  						<?php echo $news->getContenu();   ?>
  					</div>
  				</div>
  				<hr/ id="bluetrait">
  				<div class="row">
  					<div class="col-lg-offset-6 col-lg-6">
  						<?php echo "Ecrit le ";
  							echo $news->getDate();	?>
  					</div>
  				</div>

  			</div>
      </a>
  			<div class="row">
  				<br/>
  			</div>
  		<?php
		}
			?>
  	</div>
  </div>
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

<?php include('footer.php');?>
