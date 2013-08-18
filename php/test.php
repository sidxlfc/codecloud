<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

<?php 
$host = "127.3.39.129:3306"; 
$dbname = "codecloud"; 
$userid = "adminxl5QcED"; 
$pwd = "Qim_GuYLD2a9";

$DB = new PDO("mysql:host=$host; dbname=$dbname", $userid, $pwd);

$data = array($userid); $STH = $DBH->prepare('SELECT * FROM user_data WHERE email = ?'); $STH->execute($data); $STH->setFetchMode(PDO::FETCH_ASSOC); while ($row = $STH->fetch()) { $msg = "User already exists."; } ?>


 ?>
</body>
</html>