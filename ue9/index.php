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
<div class="col-lg-1"></div>
<div class="col-lg-10">
<?php 

$host ='localhost';
$dbname ='medt3';
$user='htluser';
$pwd='htluser';

$db = new PDO ("mysql:host=$host;dbname=$dbname",$user,$pwd);

if(isset($_GET['deleteID']))
{
    $var=$_GET['deleteID'];
    $res =$db->query("DELETE FROM project WHERE id=$var");
}
$res = $db-> query ( "SELECT * FROM project");
$tmp = $res-> fetchAll(PDO::FETCH_ASSOC);


echo '<div class="table-responsive a">';
echo '<table class="table-bordered table-">';
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Description</th>";
echo "<th>CreateDate</th>";
echo "<th>Operations</th>";
foreach($tmp as $row) :?>
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['description'];?></td>
<td><?php echo $row['createDate'];?></td>
<td>
    <a href=<?php echo "index.php?deleteID=".$row['id']?>>
    <span class="glyphicon glyphicon-trash"></span></a>
    <a href="#" class="blacklink"><span class="glyphicon glyphicon-pencil"></span></a>
</td>
</tr>
<?php endforeach; ?>
	
 

</div>
</div>
<div class="col-lg-1"></div>

</div> <!-- end row -->
</div> <!-- end container -->
</body>
</html>