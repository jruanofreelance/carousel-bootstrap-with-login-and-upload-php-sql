<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<header>
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <img src="images/logo.png" class="logo-navbar rounded-circle" width="30" height="30" alt="">
        <a class="navbar-brand" href="#">Carrusel with Bootstrap, PHP, SQL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" target="_blank" href="admin/index.php">Administration
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	</header>
	<main>
		<div class="container-fluid">
      		<div class="row">
        		<div class="col-md-1"></div>
        		<div class="col-md-10">
        			<h3>Carousel</h3>
        			<p class="lead">Images of the initial page's Carousel</p>
        			<div class="container">
			  	<?php
					include('includes/db.php');

					$query = "SELECT * FROM slider";
					$slides = $db->query($query);
					$rows = $slides->num_rows;

					if($slides->num_rows>0){
				?>
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  				<ol class="carousel-indicators">
				<?php
						for ($i = 0; $i < $rows; $i++) {

							$hasClass = '';

							$res = ($i == 0) ? $hasClass = 'class="active"'  : $hasClass = '';

				?>
						    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php echo $hasClass; ?> ></li>
				<?php
						}
				?>
							</ol>
			  				<div class="carousel-inner">

						<?php

						$i = 0;

						while($row = $slides->fetch_assoc()){
								
							if($i == 0){
				?>
								<div class="carousel-item active">
									<img src="<?php echo "images/slider/".$row['image']; ?>" class="d-block w-100"/>
								</div>
				<?php
							}else{
				?>
								<div class="carousel-item">
									<img src="<?php echo "images/slider/".$row['image']; ?>" class="d-block w-100"/>
								</div>
				<?php
							}

								$i++;
					
					    }

					}
	            ?>
						    </div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							</a>
						</div>
					</div>
			    </div>
       			<div class="col-md-1"></div>
      		</div>
    	</div>
	</main>
	<footer class="py-3 bg-dark fixed-bottom">
	    <div class="container">
        	<p class="m-0 text-center text-white">J.Ruano</p>
	    </div>
	</footer>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>