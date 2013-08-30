<?php
$fileName=$_POST['fileName'];
session_start();
$email = $_SESSION['sessionVar'];
$filePath=  '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
$output=shell_exec('gcc -g -O -c $filePath ');
header("Location: myFiles.php");
die();
?>