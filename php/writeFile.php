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
<html>
<head>  </head>
<body>
<?php 
$fileData=$_POST['fileContents'];
$fileName=$_POST['fileName'];
session_start();
$email = $_SESSION['sessionVar'];

$filePath='/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/".$fileName;
$handle=fopen($filePath,"w+");
$x=fwrite($handle,$fileData);

if($x!=NULL)
{

    
    header("Location: myFiles.php");
			die();

}else
{
    echo "Something went wrong. Your file wasn't saved! :( ";
}




?>    
    
</body>


</html>
