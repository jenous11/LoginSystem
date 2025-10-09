<?php
// write logic to check if the similarity in data
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    // $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    try {
        require "connect.php";
        $sql = "SELECT *FROM users;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        $pdo = null;
    } catch (PDOException $e) {
        echo "error " . $e->getMessage();
    }
} else {
    echo "There was an error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // session_start();
    foreach ($results as $rows) {
        if ($rows['EMAIL'] == $email ) {
                echo "<br>";
            echo "email is a match!";
                echo "<br>";

            if(password_verify($password, $rows['user_password'])) {
                echo password_verify($password, $rows['user_password']);
                header("location: ../userpage.php");
            } else {
                echo "<br>";
                echo "the password doesnot match! ";
                echo "<a href='../registration.php'><button>back</button></a>";
                echo "<br>";
            }
        } else {
            echo "<br>";
            echo "error!";
            echo "<br>";
        }
    }
    ?>
</body>

</html>