<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
	<title>Datenbankzugriff</title>
</head>
<body>
<div class="container">

<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-8">
<?php 

$host ='localhost';
$dbname ='medt3';
$user='htluser';
$pwd='htluser';

$db = new PDO ("mysql:host=$host;dbname=$dbname",$user,$pwd);

$res = $db-> query ( "SELECT * FROM project");
$tmp = $res-> fetchAll(PDO::FETCH_ASSOC);



echo '<table class="table-bordered table.responsive t">';
echo "<th>Name</th>";
echo "<th>Description</th>";
echo "<th>CreateDate</th>";
foreach($tmp as $row)
{
	echo "<tr>";
		echo "<td>" .$row['name'] ."</td>";
		echo "<td>" .$row['description'] ."</td>";
		echo "<td>" .$row['createDate'] ."</td>";
	echo "</tr>";

}
echo "</table>";
 ?>
 


</div>
<div class="col-lg-2"></div>

</div> <!-- end row -->
</div> <!-- end container -->
</body>
</html>