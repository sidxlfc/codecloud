<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php 

session_start();
$email = $_SESSION['sessionVar'];
$dir    = '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/";

$files1 = scandir($dir);

foreach ($files1 as  $value) {
	echo "\n";
	echo "\n $value  \n";
	echo "\n;"
	}

?>
</head>
<body>

</body>
</html>