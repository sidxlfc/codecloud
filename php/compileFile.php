<?php
/*$fileName=$_POST['fileName'];
session_start();
$email = $_SESSION['sessionVar'];
$filePath=  '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
echo $filePath;
$output= exec('gcc -g -O -c '.$filePath);
echo $output;
*/
	#$output=exec('gcc -g -O -c '.$filePath);
	exec('gcc -c /var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/bs.sameer1@gmail.com/Hello.c  -o /var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/bs.sameer1@gmail.com/something.o ',$output,$return);
	echo $output;
	echo $return;
?>