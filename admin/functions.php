<?php 

$num = $_GET['num'];
$error = "";

if($num == 1){

	insert();

}else{

	$error = "There was an error, try again";
	errorMessage($error);

}

function insert(){

	//Only the insert is completed if the image is selected and it is jpg and less than 1MB
	if ($_FILES['image']['type'] == "image/jpeg") {

		if ($_FILES['image']['size'] < 1000000) {

			$image = $_FILES['image']['name'];
			copy($_FILES['image']['tmp_name'] , "../images/slider/".$image);

			include("includes/db.php");

			$sql = "INSERT INTO slider(image) VALUES('$image')";
			$res = $db->query($sql);

			if($res){ 

				header("Location: index.php");

			}else{ 

				$error = "There was an error, try again";
				errorMessage($error);

			}

		}else{

			$error = "Images only allowed under 1MB";
			errorMessage($error);
		}

	}else{

		$error = "Only images are allowed .jpg";
		errorMessage($error);

	}

}

function errorMessage($error){

	echo '<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="utf-8">
					<title>Error File Upload</title>
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				    <link rel="stylesheet" type="text/css" href="css/styles.css">
				</head>
				<body>
				<header>
				    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				      <div class="container">
				        <a class="navbar-brand" href="#"><img src="images/logo.png" class="logo-navbar" width="30" height="30" alt="">Carrusel with Bootstrap, PHP, SQL</a>
				      </div>
				    </nav>
				</header>
				<main>
					<div class="container">
						<div class="form-signin">
							<h2 class="form-signin-heading">Error</h2>
							<p>' . $error . '</p>
							<br/><br/>
							<input type="button" class="btn btn-lg btn-primary block" onclick="history.back()" name="Go back" value="Go back">
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
				</html>';

}

?>