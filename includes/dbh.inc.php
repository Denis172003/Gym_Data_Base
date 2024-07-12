<?php

$dns = "mysql:host=localhost;dbname=bd_denis";
$dbusername = "root";
$dbpassword = "";



try{

$pdo = new PDO ($dns,$dbusername,$dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOEXCEPTION $e){

    echo "Connection failed :". $e->getMessage();

}


?>