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
<?php
$fileName=$_POST['fileName'];
$objectFileName= str_replace('.c', '.o' , $fileName);
$objectFileName= str_replace('.cpp', '.o' , $fileName);

#echo $objectFileName;
session_start();
$email = $_SESSION['sessionVar'];
$sourceFilePath= '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
$objectFilePath= '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$objectFileName;
#echo $filePath;
$command='gcc -v -c '.$sourceFilePath.' -o '.$objectFilePath;
#echo $command;
$output=shell_exec($command);
echo $output;

	
$file = $objectFilePath;

if (file_exists($file)) {
	echo $output;
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