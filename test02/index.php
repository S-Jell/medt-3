<!DOCTYPE html>
<html>
<head>
	<title>Test02</title>
</head>
<body>

<form action="<?php $_SERVER['PHP_SELF'] ?>">
<label>Anzahl der Felder <input type="text" name="numOfInputFields"></label>
<br><br>
<button type="submit" name="generateFormBtn" value="generate">Felder generieren</button>
</form>


<?php  
	if (isset($_GET['generateFormBtn'])) {
		echo '<h3>Generator output</h3>';
		echo '<form action="'.$_SERVER['PHP_SELF'].'">';
		$anz=$_GET['numOfInputFields'];
		for ($i=1; $i < $anz+1; $i++) { 
			echo '<label>Field '.$i.' <input type="text" name="field'.$i.'"></label><br>';
		}
		echo '<br><button type="submit" name="submitBtn" value="submit">Abschicken</button>';
		echo '<input type="hidden" name="anz" value="'.$anz.'"></input>';
		echo '</form>';

	}
?>

<?php  
	if (isset($_GET['submitBtn'])) {
		for ($i=1; $i < $_GET['anz']+1; $i++) { 
			echo '<p>Field '.$i.': '.$_GET['field'.$i].'</p>';
		}
	}
?>
</body>
</html>