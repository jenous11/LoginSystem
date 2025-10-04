<?php

$dsn="mysql:host=localhost;dbname=loginsystem";
$username="root";
$password="chelse@11";

try{
    $pdo=new pdo($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo"error: ".$e->getMessage();
}