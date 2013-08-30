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
<? 

$email= $_POST["email"];
$password = $_POST["password"];
$passwordHash = sha1($password);


 try {
        require 'conf.php';
        $conn = mysqlConnector();
       # $query= "SELECT * FROM user_data WHERE userEmail='$email'";
   
 	session_start();
	$sth = $conn->prepare("SELECT * FROM user_data WHERE userEmail='$email'");
	$sth->execute();
   	$result = $sth->fetch(PDO::FETCH_OBJ);
	$targetPassword=  $result->userPassword;
		if ($targetPassword == $passwordHash) {
			echo "Match! Redirecting! ";
			
 			 
  			 $_SESSION['sessionVar'] = $email;
  			
			header("Location: myFiles.php");
			die();
		}
		else
		{
			echo "Sorry the email and password do not match ";
		}


    }
		catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
        }


?>

</head>
<body>



</body>
</html>