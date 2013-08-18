<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php 

session_start();
  $email = $_SESSION['sessionVar'];
  if ($handle = opendir('/var/lib/openshift/52106d8ce0b8cd5b44000013/app-root/runtime/repo/php/userData/$email')) {
    echo "Directory handle: $handle\n";
    echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        echo "$entry\n";
    }

    

    closedir($handle);
}
?>
</head>
<body>

</body>
</html>