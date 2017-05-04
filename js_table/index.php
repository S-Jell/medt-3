<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<style>
.blacklink{text-decoration: none;
			color:black;

}
.blacklink:hover{
color:black;
	
}
</style>
<body>
<div class="container">
<?php
//DB Settings 
$host='localhost';
$dbname='medt3';
$user='htluser';
$pwd='htluser';

//Establish connection
try{$db = new PDO ("mysql:host=$host; dbname=$dbname", $user, $pwd); }catch(PDOEXCEPTION $e){exit();}

if(isset($_POST['deleteProID'])){
    echo "Hallo du";
    exit;
}
//Select table with query
//$res=PDOStatement
$res=$db->query("SELECT * FROM project");
//array
$tmp=$res->fetchAll(PDO::FETCH_OBJ);
?>
<div class="page-header">
            <h1>Trackstar Light</h1>
 </div>
 <p id="succbox"></p>

<table class="table table-hover table-bordered table-responsive table-inverse">
<thead><tr><th>Name</th>
<th>Description</th>
<th>CreationDate</th>
<th>Operationen</th></tr></thead>
<?php foreach($tmp as $row) :?>
<tr id=<?php echo $row->id;?>>
<td><?php echo htmlspecialchars($row->name);?></td>
<td><?php echo $row->description;?></td>
<td><?php echo $row->createDate;?></td>
<td>

<span class="glyphicon glyphicon-trash del-Icon"></span>
<span class="glyphicon glyphicon-pencil"></span></td>
</tr>
</p>
<?php endforeach; ?>

</table>
<a href=<?php echo "index.php?insertIt=1"?> style="color:white;"><button class="btn btn-success">New Project</button></a>


</div>

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="app.js"></script>   
</body>
</html>