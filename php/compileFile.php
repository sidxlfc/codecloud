<?php
$fileName=$_POST['fileName'];
$objectFileName= str_replace('.c', '.o' , $fileName);
echo $objectFileName;
session_start();
$email = $_SESSION['sessionVar'];
$sourceFilePath=  '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
$objectFilePath= '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$objectFileName;
echo $filePath;
$command='gcc -c '.$sourceFilePath.' -o '.$objectFilePath;
echo $command;
exec($command,$output,$return);
	
$file = $objectFilePath;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}

?>