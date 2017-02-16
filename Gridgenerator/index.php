<!DOCTYPE HTML5>

<html>
	<header>
	<meta charset="utf-8">
	<title>Gridgenerator</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="animate.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</header>
	
	<body>
	
		
		<div class="container ">
		<div class="page-header">
			<h1 style="color:#044df2;" class="<?php if(isset($_POST['submitter'])){echo 'animated pulse';} ?>">Gridgenerator</h1>
		</div> 
		<div class="container-fluid">
		<form class="form-inline" action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST">
			<div class="row">
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Sunday" name="days[]" style="width:3%;"><label>Sunday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Monday" name="days[]" style="width:3%;"><label>Monday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Tuesday" name="days[]" style="width:3%;"><label>Tuesday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Wednesday" name="days[]" style="width:3%;"><label>Wednesday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Thursday" name="days[]" style="width:3%;"><label>Thursday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Friday" name="days[]" style="width:3%;"><label>Friday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<input type="checkbox" class="form-control" value="Saturday" name="days[]" style="width:3%;"><label>Saturday</label>
  				</div>
  				<div class="form-group col-lg-12 col-xs-12">
    				<label style="margin-right:10px;">Enter number of fields  </label><input type="text" class="form-control" id="count" name="cnt">
  				</div>
  				<div class=" col-lg-12 col-xs-12" style="padding-top:15px;">
  				<button type="submit" class="btn button <?php if(isset($_POST['submitter'])){echo 'animated pulse';} ?>" name="submitter">Generate</button>
				</div>
			</div>
		</form>
		<div class="row">
			<?php

				if(isset($_POST['submitter'])){
				$arrayday = $_POST['days'];
				if(is_null($arrayday))
				{
					echo '<h1 style="font-size:30px;color:red;">Please select a day!</h1>';
				}
				else
				{
					echo "<div class=\"col-lg-12 col-xs-12 table-responsive animated fadeInDown\">";
					echo "<table class=\"table\">";
					echo "<thead>";

					echo "<th>Day</th>";
					for($i=1;$i<$_POST['cnt']+1;$i++){
					
					echo "<th>Event ".$i."</th>";
					
					}
					echo "</thead>";
					
					for($j=0;$j < sizeof($arrayday);$j++){
						echo "<tr>";
						echo "<td>".$arrayday[$j]."</td>";

						for($i=1;$i<$_POST['cnt']+1;$i++){
							$j+=1;
							echo "<th>Event ".$j.".".$i."</th>";
							$j-=1;
						}

						echo "</tr>";

						}
					echo "</table>";
					echo "</div>";
				}
				
				
				}

					

			?>
		</div>
		</div>
		</div>
		</div>	
	
	</body>
</html>