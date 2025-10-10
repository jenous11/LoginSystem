<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // making session for the user
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['user_password'] = $user_password;
    
    // echo $user_password;
    try {
        require "connect.php";
        $sql = "INSERT INTO users (EMAIL,user_password) VALUES (:email,:user_password);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":user_password", $user_password);
        $stmt->execute();
        $pdo = null;
        $stmt = null;
        header("Location: ../userpage.php");
        exit();
    } catch (PDOException $e) {
        echo "error: " . $e->getMessage();
    }
} else {
    echo "error while getting input values";
}
