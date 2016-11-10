<!DOCTYPE html>
<html>
<head>
	<title>Php Login Bootstrap</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<meta charset="UTF-8">
</head>
<body>

<div class="container-fluid content">
	<div class="row login">
		<div class="col-lg-4"></div>

		<div class="col-lg-4">
			<form>
			  <div class="form-group">
			  	<div class="input-group">
				  	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input class="form-control input" id="exampleInputFirstName" name="firstName" placeholder="Vorname">
			    </div>
			  </div>
			  <div class="form-group">
				  	<div class="input-group">
				  	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input class="form-control input" id="exampleInputLastName" name="lastName" placeholder="Nachname">
			    </div>
			  </div>
				  <div class="text-center">
				  <button type="submit" class="btn btn-default button" name="submitBtn">LOGIN</button>
			  		</div>
			</form>

			<div class="text-center">
			<?php
				if(isset($_GET['submitBtn']))
				{
					echo "<p style='color:#999BB2;font-size:24px;margin-top:10px;'>Vorname: " .$_GET['firstName']."</p>";
					echo "<p style='color:#999BB2;font-size:24px;'>Nachname: " .$_GET['lastName']."</p>";
				}
			?>
			</div>
		</div>

		<div class="col-lg-4"></div>
	</div> <!-- end row -->
</div> <!-- end container -->



<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>