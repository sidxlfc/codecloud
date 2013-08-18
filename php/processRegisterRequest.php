<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$email= $_GET["email"];
$password = $_GET["password"];
$confirmPassword = $_GET["confirmPassword"];
$passwordHash=sha1($password);

if ($password !== $confirmPassword)
	echo "Passwords do not match kindly go back and re enter.";
else


 try {
                require_once 'conf.php';
                $conn = mysqlConnector();
             
                #mkdir("~/$email",0777,true);

	$query = "INSERT INTO user_data(userEmail,userPassword) VALUES('$email' , '$passwordHash' )";
	
	if($updateDb = $conn->query($query) or die($conn->error)) {
		echo "Congrats! Go back to home and login! ";
		echo getcwd();
               
}

        } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
        }




 ?>

</body>
</html>


