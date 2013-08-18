<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

<?php 
$host = "127.11.226.2"; 
$dbname = "codecloud"; 
$userid = "adminxl5QcED"; 
$pwd = "Qim_GuYLD2a9";

$DB = new PDO("mysql:host=$host; dbname=$dbname", $userid, $pwd);

$result= $DB -> query ("SELECT * FROM user_data" ) or die ($DB -> error);

$rows = array();
while($r = $result->fetch_object()) {
  $rows[] = $r;
}

echo json_encode($rows);


 ?>
</body>
</html>