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
<?php 
$email= $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$passwordHash=sha1($password);

if ($password !== $confirmPassword)
	echo "Passwords do not match kindly go back and re enter.";
else


 try {
                require_once 'conf.php';
                $conn = mysqlConnector();
             	$sth = $conn->prepare("SELECT * FROM user_data WHERE userEmail='$email'");
				$sth->execute();
   				$result = $sth->fetch(PDO::FETCH_OBJ);
				$targetEmail=  $result->userEmail;

				if($targetEmail==$email)
				{
					echo "Sorry this email id/username is already registered! ";

				}
				
				else {
				$path= "/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/data/".$email;
                mkdir($path,0777,true);

				$query = "INSERT INTO user_data(userEmail,userPassword) VALUES('$email' , '$passwordHash' )";
	
				if($updateDb = $conn->query($query) or die($conn->error)) 
				{
				echo "Congrats! <a href=\"index.php\" > Go back to home and login </a> ! ";
				}
				}

             	

     } 
catch(PDOException $e) 
{
                echo 'ERROR: ' . $e->getMessage();

}




 ?>

</body>
</html>


