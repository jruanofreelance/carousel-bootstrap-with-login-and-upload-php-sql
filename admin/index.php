<?php

session_start();
include('includes/db.php');

if(!isset($_SESSION['email'])){

  header("Location:logIn.php");
  exit();

}

if(isset($_GET['entidad']) && isset($_GET['accion']) && isset($_GET['id'])){

  $entidad=mysqli_real_escape_string($db,$_GET['entidad']);
  $accion=mysqli_real_escape_string($db,$_GET['accion']);
  $id=mysqli_real_escape_string($db,$_GET['id']);

  if($accion=="delete"){

    if($entidad=="post"){

      $query="DELETE FROM slider WHERE slideId = '$id'";

    }
  }
    $db->query($query);

  if(isset($q)){

    $db->query($q);

  }

}

?>
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
	<!-- Navigation -->
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <img src="../admin/images/<?php echo $_SESSION['authorImage'] ?>" class="logo-navbar rounded-circle" width="30" height="30" alt="">
        <a class="navbar-brand" href="#"><?php echo $_SESSION['authorName']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" target="_blank" href="../index.php">Go to Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	</header>
  <main>
	
	    <!-- Page Content -->
	     <div class="container-fluid">

      <div class="row">

        <div class="col-md-1"></div>

        <div class="col-md-10">

          <h2>Carrusel with Bootrap, PHP, SQL</h2>

        <h3>Upload new image</h3>
        <p class="lead">Select and upload a new image for the Carousel</p>
           
      <form method="post" enctype="multipart/form-data" action="functions.php?num=1">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="file" name="image" required></td>
              <td><button class="btn btn-primary" name="login" type="submit">Upload image</button></td>
            </tr>
          </tbody>
        </table>
        
        
      </form>
        
        <h3>Slider</h3>
        <p class="lead">Images of the initial page's Carousel</p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM slider";

          $slides = $db->query($query);

          if($slides->num_rows>0){

            while($row = $slides->fetch_assoc()){
              ?>
            <tr>
              <th scope="row"><?php echo $row['slideId']; ?></th>
              <td><img src="<?php echo "../images/slider/".$row['image']; ?>" class="img-fluid" alt="Responsive image"></td>
              <td><a href="index.php?entidad=post&accion=delete&id=<?php echo $row['slideId']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>

            <?php 
            }

          }

            ?>
          </tbody>
        </table>
      </div>

       <div class="col-md-1"></div>
      </div>
    </div>
	    <!-- /.container -->
	</main>
	<!-- Footer -->
	<footer class="py-3 bg-dark fixed-bottom">
	    <div class="container">
        <p class="m-0 text-center text-white">J.Ruano</p>
	    </div>
	      <!-- /.container -->
	</footer>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
