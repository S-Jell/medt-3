<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
echo $_SERVER['REQUEST_URI'];
echo "<br> GET: ";
var_dump($_GET);

echo "<br> POST: ";
var_dump($_POST);
 ?>
</body>
</html>