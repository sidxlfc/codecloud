

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$email= $_GET["email"];
$password = $_GET["password"];
$confirmPassword = $_GET["confirmPassword"];
$passwordHash=sha1($password);
if ($password !== $confirmPassword)
	echo "Passwords do not match kindly go back and re enter.";
else
$mysql = new mysqli('mysql://$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT/', 'adminxl5QcED', 'Qim_GuYLD2a9', 'codecloud') or die('you\'re dead');
$result= $mysql -> query (" INSERT INTO user_data(userEmail,userPassword) VALUES('$email' , '$passwordHash' )  " ) or die ($mysql -> error);
mkdir("~/$email",0777,true);


 ?>

</body>
</html>


