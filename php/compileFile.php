<?php
/*
 * Copyright (C) 2013 Sameer Balasubrahmanyam

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?
$fileName=$_POST['fileName'];
if(stristr($fileName, '.cpp') === FALSE)
{
	$objectFileName= str_replace('.c', '.o' , $fileName);
	
}
else 
{
	$objectFileName= str_replace('.cpp', '.o' , $fileName);
}
session_start();
$email = $_SESSION['sessionVar'];
$sourceFilePath= '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
$objectFilePath= '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$objectFileName;
$command='gcc -c '.$sourceFilePath.' -o '.$objectFilePath. ' 2>&1 ';
$output=shell_exec($command);
echo str_replace("/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/".$email."/", "<br>" , $output);

$file = $objectFilePath;

if (file_exists($file)) {

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$objectFileName);
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
</body>
</html>
