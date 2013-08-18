<?php
 try {
                require_once 'conf.php';
                $conn = mysqlConnector();
                $stmt = $conn->prepare('SELECT * FROM demo');
                $stmt->execute();

                while($row = $stmt->fetch()) {
                        print_r($row);          
                }


        } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
        }


?>
<?php
 try {
                require_once 'conf.php';
                $conn = mysqlConnector();
                $stmt = $conn->prepare('SELECT * FROM user_data ');
                $stmt->execute();

                while($row = $stmt->fetch()) {
                        print_r($row);          
                }


        } catch(PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
        }


?>
