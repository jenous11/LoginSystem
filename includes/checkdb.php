<?php
session_start();
// write logic to check if the similarity in data
echo $_SESSION['password'];
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST["email"];
    $password2 = $_POST["password2"];
    $_SESSION['email']=$email;
    $_SESSION['password2']=$password2;
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
    echo "<br>";
    echo"The session email entered in login  is ". $_SESSION['email'];
    echo "<br>";
    echo"The session password entered in login is ". $_SESSION['password2'];
    echo "<br>";
    echo "The previous password is ";
    echo $_SESSION['password'];
    // session_start();
    foreach ($results as $rows) {
        echo "comparing with: ";
        echo "<br>";
        echo $rows['EMAIL'];
        echo "<br>";
        echo "comparing to: ";
        echo $_SESSION['email'];
        echo "<br>"; 

        echo "comparing with: ";
        echo "<br>";
        echo $_SESSION['password'];
        echo "<br>";
        echo "comparing to: ";
        echo $_SESSION['password2'];
        echo "<br>"; 

        if ($rows['EMAIL'] == $_SESSION['email'] ) {
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