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
	<title>Code Cloud</title>

</head>
<body>
    <form action="openFile.php" method="post">
    <p>Enter the Name of a new file or enter a name from the list below</p> <br>
    <input type="text" name="fileName" placeholder="Enter file name"/>
    <input type="submit" value="Open"/>
    </form>
<?php 
session_start();
$email = $_SESSION['sessionVar'];
$_SESSION['sessionVar'] = $email;
  			
$dir    = '/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/'.$email."/";

$files1 = scandir($dir);

foreach ($files1 as  $value) {
	
	echo $value." <br> ";
	
	}

?>

</body>
</html>