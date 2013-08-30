<?php
$fileName=$_POST['fileName'];
$objectFileName= str_replace('.c', '.o' , $fileName);
echo $objectFileName;
session_start();
$email = $_SESSION['sessionVar'];
$filePath=  '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
echo $filePath;
$command='gcc -c'.$filePath.' -o /var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$objectFileName;
echo $command;
exec($command,$output,$return);
	echo $output;
	echo $return;
?>