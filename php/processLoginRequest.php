<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

$email= $_GET["email"];
$password = $_GET["password"];
$passwordHash = sha1($password);


 try {
                require_once 'conf.php';
                $conn = mysqlConnector();
                $query="SELECT userPassword FROM user_data WHERE userEmail='$email' ";
                
        if($targetPassword = $conn->query($query) or die($conn->error)) 
        {
        	echo  $targetPassword;
			if ($passwordHash == $targetPassword) 
			{
			echo " Authentication Successful! Redirecting.... ";
			echo $targetPassword;
			}
			else 
			{
			echo "Sorry wrong username and/or password fisrt loop";
			}
               
		}
		
		else 
		{
		echo "Sorry wrong username and/or password second loop";
		}
	


    }


         catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
        }


 ?>
</body>
</html>