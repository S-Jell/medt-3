<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	*
	{
		font-size: 30px;
		cursor:pointer;
	}
	
</style>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="jquery-3.2.0.js"></script>



	



</head>
<body>
<div class="container">
	<div class="col-lg-12">
		<button class="btn btn-default btn-lg btn-success" id="add" style="margin-top: 10px;">ADD</button>
		<button class="btn btn-default btn-lg btn-danger" id="del" style="margin-top: 10px;">REMOVE</button>

		<table class="table table-hover" id="t">
			<thead>
              <tr>
                  <th>Name</th>
                  <th>Money</th>
              </tr>
          	</thead>

	      <tbody id="mytbody">
	          
	      </tbody>
		</table>
		
	</div>

	



</div> <!-- end container -->


<script type="text/javascript" src="function.js"></script>
</body>
</html>