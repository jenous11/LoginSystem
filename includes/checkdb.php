<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email2 = $_POST["email2"];
    $password2 = $_POST["password2"];
    $_SESSION['email2'] = $email2;
    $_SESSION['password2'] = $password2;
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
    echo "There was an error!...";
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
    echo $_SESSION['password2'];
    echo "<br>";
    foreach ($results as $rows) {
        if ($rows['EMAIL'] == $_SESSION['email2']) {
            echo "<br>";
            echo "email is a match! Checking for password...";
            echo "<br>";
            if (password_verify($password2, $rows['user_password'])) {
                echo password_verify($password2, $rows['user_password']);
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
            break;
            echo "<br>";
        }
    }
    ?>
</body>

</html>