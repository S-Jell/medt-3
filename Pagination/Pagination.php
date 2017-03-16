<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        a {
            margin-left: 10px;
        }
        table {
            border-style: solid;
            border-width: 2px;
            margin-top: 20px;
        }
    </style>
</head>
<body class="container">
<?php




$host = 'localhost';
$dbname = 'classicmodels';
$user = 'htluser';
$pwd = 'htluser';
$limit = 20;
$limitNext = 0;
$change = 1;


$db = new PDO ("mysql:host=$host;dbname=$dbname", $user, $pwd);

$res = $db->query("SELECT COUNT(*) FROM customers");
$temp = $res->fetchColumn();

$count = ceil($temp/20);

if(!isset($_GET['chg']))
{
    $_GET['chg'] = 1;
    $res = $db->query("SELECT * FROM customers LIMIT $limitNext, $limit");

    $tmp = $res->fetchAll(PDO::FETCH_ASSOC);
}
else if (isset($_GET['chg']))
    
{
    if ($_GET['chg'] < 1)
    {
        $_GET['chg'] = 1;
    }
    if ($_GET['chg'] > $count)
    {
        $_GET['chg'] = $count;
    }
    $limitNext=$limit*($_GET['chg']-1);
    $res = $db->query("SELECT * FROM customers LIMIT $limitNext, $limit");
    $tmp = $res->fetchAll();
}

echo "<table class='table table-inverse'>";
echo "<tr>";

echo "<th><p>Unternehmen</th>";
echo "<th><p>Nachname</th>";
echo "<th><p>Vorname</th>";
echo "<th><p>PLZ</th>";
echo "<th><p>Ort</p></th>";
echo "</tr>";

foreach ($tmp as $row) {
    echo "<tr>";
    echo "<td>" . $row['customerName'] . "</td>";
    echo "<td>" . $row['contactLastName'] . "</td>";
    echo "<td>" . $row['contactFirstName'] . "</td>";
    echo "<td>" . $row['postalCode'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<div style='text-align: center;'>";
echo "<a href=\"".$_SERVER['PHP_SELF']."?chg="."1". "\" style='color: blue'><span class='glyphicon glyphicon-backward' aria-hidden='true'></span></a> ";
echo "<a href=\"".$_SERVER['PHP_SELF']."?chg=".($_GET['chg']-1)." .\" style='color: blue'><span class='glyphicon glyphicon-menu-left' aria-hidden='true' ></span></a>";

for ($i = 1;$i <= $count;$i++){
    echo "<a href=\"".$_SERVER['PHP_SELF'].'?chg='.$i."\">".$i."</a>";
}

echo "<a href=\"".$_SERVER['PHP_SELF']."?chg=".($_GET['chg']+1)."\" style='color: blue'><span class='glyphicon glyphicon-menu-right' aria-hidden='true'></span></a>";
echo "<a href=\"".$_SERVER['PHP_SELF']."?chg=".$count."\" style='color: blue'><span class='glyphicon glyphicon-forward' aria-hidden='true'></span></a> ";


?>
</div>
</body>
</html>
