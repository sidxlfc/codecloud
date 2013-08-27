<html>
<head> </head>
<body>
    
<?php 
session_start();
$fileName=$_GET['fileName'];
$email = $_SESSION['sessionVar'];

echo $fileName;
echo $email;
?>
    
</body>
</html>