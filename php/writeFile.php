<html>
<head>  </head>
<body>
<?php 
$fileData=$_POST['fileContents'];
$fileName=$_POST['fileName'];
echo $fileData;
    echo "##############################";
session_start();
$email = $_SESSION['sessionVar'];
echo $email;
 echo "##############################";
echo $fileName;
 echo "##############################";

?>    
    
</body>


</html>
