<?php
#*************************************CONNECTING THE SERVER STARTS************************************
#Defining the database connection variables
$serverName="127.0.0.1";
$username="root";
$password="";
$dbName="cbt-db";

#Creating the Connection
try{
    $pdo=new PDO ("mysql:host=$serverName; port=3306 ;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Succussfully connected to the database";
}catch (PDOException $exception){
    echo "Got this error in connection" . $exception->getMessage() . "\n"; 
}
#*************************************CONNECTING THE SERVER ENDS************************************

?>