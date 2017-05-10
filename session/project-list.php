<?php
include 'db.php';
include 'session.php';


if(isset($_POST['logout']))
{
  session_destroy();
  header("Location: index.php");
}
if($session_check==false)
{
  header("Location: index.php?error");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>dbAccess</title>

    <!-- Latest compiled and minified CSS -->
    <?php
      include 'links.php';

     ?>
    <style type="text/css">
      .container
        {
          min-height: 1000px;
          margin-top:30px;
          border: 2px solid black;
          background-color: rgba(255,255,255,0.05);
        }
        .items_edit
        {
          color:green;
        }
        .items_delete
        {
          color:#b71f1f;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <h1>Trackstar</h1>
    <p>
      <a href="project-list.php?insert"><button type="button" class="btn btn-default">Insert  </span></button></a>
       <a href="project-list.php?new"><button type="button" class="btn btn-default" >New Project  <span class="glyphicon glyphicon-plus"></button></a>
       <a href="project-list.php?dele"><button type="button" class="btn btn-default">Delete everything</button></a>

  </p>
  <br>

<?php

// DB Settings
$host = 'localhost';
$dbname = 'medt3';
$user ='htluser';
$pwd = 'htluser';

// Establish & check connection
try {
   $db = new PDO ("mysql:host=$host;dbname=$dbname", $user, $pwd);
} catch (PDOException $e) {
   echo "<h1>Error: " . $e->getMessage()."</h1>";
   die();
}



if (isset($_GET['insert'])) {
  $ins = "
    USE medt3;
    DROP TABLE IF EXISTS project;
    CREATE TABLE project (id INTEGER NOT NULL auto_increment, name varchar(255) NOT NULL, description text, createDate DATETIME NOT NULL, PRIMARY KEY (id));
    INSERT INTO project (name, description, createDate) VALUES ('Demo App A','Some text','2014-02-10 12:00:00'), ('Demo App B','Some text text','2014-02-10 12:01:00'), ('Demo App C','Some text text text','2014-02-10 12:02:00'), ('Demo App D','Some text text text text','2014-02-07 12:02:00'), ('Demo App E','Some text text text text text','2014-02-09 11:02:00'), ('Demo App F','Some text','2014-02-10 12:00:00'), ('Demo App G','Some text text','2014-02-10 12:01:00'), ('Demo App H','Some text text text','2014-02-10 12:02:00'), ('Demo App I','Some text text text text','2014-02-07 12:02:00');
  ";
  $db->exec($ins);
}
echo "</p>";

// DELETE Statement
if (isset($_GET['delete'])) {
  $del = "DELETE FROM project WHERE id = ".$_GET['delete'];
  $db->exec($del);
}
if (isset($_GET['dele']))
{
  $sql = "DELETE from project";
  $db -> exec($sql);
}
// UPDATE Statement
if (isset($_GET['change'])) {
  $sql = "SELECT * FROM project WHERE id = ".$_GET['change'];
  $res = $db->query($sql);
  $tmp = $res->fetch(PDO::FETCH_OBJ);

?>

<h2>Projekt bearbeiten</h2>
<form class="form-horizontal" action="project-list.php">
  <div class="form-group">
    <label class="control-label col-sm-2">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="<?php echo $tmp->name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="desc" value="<?php echo $tmp->description; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="date" value="<?php echo $tmp->createDate; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="changed" value="<?php echo $_GET['change']; ?>" class="btn btn-success">Aktualisieren</button>
      <button type="cancel" class="btn btn-danger">Abbrechen</button>
    </div>
  </div>
</form>
<br>

<?php
}
if(isset($_GET['new']))
{
  $var = date("Y-m-d H:i:s");
  ?>
  <h2>Neues Projekt</h2>
<form class="form-horizontal"  action="project-list.php">
  <div class="form-group">
    <label class="control-label col-sm-2">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="desc" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="date" value="<?php echo $var?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="newp" value="<?php echo $_GET['new']; ?>" class="btn btn-success">Anlegen</button>
      <button type="cancel" class="btn btn-danger">Abbrechen</button>
    </div>
  </div>
</form>
<br>

  <?php
}

if(isset($_GET['newp']))
{
  $name = $_GET['name'];
    $desc = $_GET['desc'];
    $date = $_GET['date'];
    $sql = "INSERT INTO project(name,description,createDate) VALUES ('$name', '$desc', '$date');";
    $db->query($sql);
}

if (isset($_GET['changed'])) {
  $name = $_GET['name'];
  $desc = $_GET['desc'];
  $date = $_GET['date'];
  $chg = "UPDATE project SET name='$name', description='$desc', createDate='$date' WHERE id = ".$_GET['changed'];
  $db->query($chg);
}

// SELECT Statement
$sql = "SELECT * FROM project";
$res = $db->query($sql);
$tmp = $res->fetchAll(PDO::FETCH_OBJ);

// Show Table
echo "<table class=\"table table-bordered\">
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>description</th>
      <th>createDate</th>
      <th>operations</th>
    </tr>
  </thead>
  <tbody>";

$items = 0;
foreach ($tmp as $row) {
  echo "<tr>
  <td>" . $row->id . "</td>
  <td>" . $row->name . "</td>
  <td>" . $row->description . "</td>
  <td>" . $row->createDate . "</td>
  <td>
    <a href=\"project-list.php?change=$row->id\"><span class=\"glyphicon glyphicon-pencil items_edit\"></span>
    <a href=\"project-list.php?delete=$row->id\"><span class=\"glyphicon glyphicon-trash items_delete\"></span>
  </td>";
  $items += 1;
  echo "</tr>";
}



?>
    </div>
  </body>
</html>
