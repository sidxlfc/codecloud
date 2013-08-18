<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php 

session_start();
$email = $_SESSION['sessionVar'];
$dir    = '$OPENSHIFT_DATA_DIR/'.$email."/";
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