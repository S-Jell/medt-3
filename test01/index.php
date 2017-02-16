<!DOCTYPE html>
<html>
<head>

  <meta charset = "utf-8">
  
  
  <title>Test01</title>

</head>
<body>



  <form  action="<?php $_SERVER['PHP_SELF']?>" method="post" >
    
    	Which buildings do you want access to?<br>
      <input name="formDoor[]" type="checkbox" value="A">Acorn Building<br>
      <input name="formDoor[]" type="checkbox" value="B">Brown Hall<br>
      <input name="formDoor[]" type="checkbox" value="C">Carnegie Complex<br>
      <input name="formDoor[]" type="checkbox" value="D">Drake Commons<br>
      <input name="formDoor[]" type="checkbox" value="E">Elliot House<br>

    	<input type="submit" name="formSubmit" value="Submit">
    
  </form>
  

<br>

<?php
if(isset($_POST['formSubmit']))
  {
  	?>
  	<ul>
  	<?php
  	
  	$bh = false;

  	foreach ($_POST['formDoor'] as $door) 
  	{
  		echo "<li>".$door."</li>";

  		if($door=="B")
		{
			$bh = true;
		}
  	}

  	if($bh==true)
  	{
  		echo "<p>Brown Hall collapsed</p>";
  	}
  }
 ?>

</body>
</html>