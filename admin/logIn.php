<?php 
  session_start();
  include('includes/db.php');

  if(isset($_POST['login'])){

    $email=mysqli_real_escape_string($db, $_POST['email']);
    $password=mysqli_real_escape_string($db, $_POST['password']);

    $query="SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result=$db->query($query);

    $row=$result->fetch_assoc();
    $_SESSION['authorName']=$row['name'];
    $_SESSION['authorImage']=$row['image'];


    if($result->num_rows==1){

      $_SESSION['email'] =$email;
      header("Location:index.php");
      exit();

    }else{

      header("Location:logIn.php?error=1");
      exit();
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
  <link rel="stylesheet" type="text/css" href="css/styles.css" >
</head>
<body>
	<header>
	<!-- Navigation -->
	    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	      <div class="container">
	        <a class="navbar-brand" href="#"><img src="images/logo.png" class="logo-navbar" width="30" height="30" alt="">Carousel with Bootstrap, PHP, SQL
</a>
	      </div>
	    </nav>
	</header>
	<main>
	    <!-- Page Content -->
	    <div class="container">
	    <?php 

	    if(isset($_GET['error'])){

	      echo "<div class='alert alert-danger' role='alert'>Wrong email or password!!</div>";

	    } 

	    ?>

	    	<form class="form-signin" method="POST">
	    		<div id="logo-centering">
	      			<img class="mb-4" src="images/logo-sesion.png" alt="" width="72" height="72">
	      			<h1 class="h3 mb-3 font-weight-normal">Login</h1>
	      		</div>
	      		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
	      		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
	      		<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Start Session</button>
	   		</form>
	    </div>
	    <!-- /.container -->
	</main>
	<!-- Footer -->
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
