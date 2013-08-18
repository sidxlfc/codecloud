<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php 

session_start();
$email = $_SESSION['sessionVar'];
$dir    = '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/runtime/repo/php/userData/$email/';
echo $dir;
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2);

?>
</head>
<body>

</body>
</html>