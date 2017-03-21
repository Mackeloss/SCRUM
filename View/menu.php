
		<!-- LOGO-->
			<div class="row">
				<div class="col-lg-3">
					<a href="site.php"><img src="View/image/logo.png" ></a>
				</div>
			</div>
			
			<!--SOMMAIRE-->
			<div class="row">
				<div class= "col-sm-offset-7 col-sm-5" id="menuP">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
						  <ul class="nav navbar-nav">
							<li> <a href="site.php">Accueil</a> </li>
							<li> <a href="site.php?section=catalogue">Catalogue</a> </li>
							<?php if(isset($_SESSION['adherent'])){?>
								<li><a href="site.php?section=monespace&id=<?php echo $_SESSION['adherent']->getId();?>">Mon espace</a></li>
							<?php }	?>
							<li> <a href="site.php?section=contact">Contact</a> </li>
						  </ul>
						</div>
					</nav>
				</div>
		  </div>
