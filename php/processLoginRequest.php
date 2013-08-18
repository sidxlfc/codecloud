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
        $query= "SELECT * FROM user_data WHERE userEmail='$email' ";
		$result= $conn -> query($query) or die ($conn -> error);
		echo "result";
		print_r($result);


    else
    	{
    		echo "something went wrong";
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