<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    // making session for the user
    $_SESSION['username']=$username;
try{
    require "connect.php";
    $sql="INSERT INTO users (EMAIL,PASSWORD) VALUES (:email,:password);";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $pdo=null;
    $stmt=null;
    header("Location: ../userpage.php");
    exit();
}
catch(PDOException $e){
    echo "erro: ".$e->getMessage();
}
}
else{
    echo"error while getting input values";
}