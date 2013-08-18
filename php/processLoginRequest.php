<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

$email= $_GET["email"];
$password = $_GET["password"];


 try {
                require_once 'conf.php';
                $conn = mysqlConnector();
                $query="SELECT userPassword from user_data ";

        if($targetPassword = $conn->query($query) or die($conn->error)) 
        {
		if ($(sha1($password))== $targetPassword) {
			echo " Authentication Successful! Redirecting.... ";
		}
			else 
	{
	echo "Sorry wrong username and/or password";
	}
               
		}
			else 
	{
	echo "Sorry wrong username and/or password";
	}
	


    }


         catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
        }







 ?>
</body>
</html>