<!DOCTYPE html>
<html>
<head>
	<title></title>
<? 

$email= $_GET["email"];
$password = $_GET["password"];
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