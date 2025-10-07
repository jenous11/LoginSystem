<?php
// write logic to check if the similarity in data

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
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
    foreach ($results as $rows) {
        // echo"The one we entered in the login is: ";
        // echo "<p>".$rows['EMAIL']."</p>";

        // echo"The one we entered in the registration is: ";
        //     echo "<br>";
        // echo  $email;
        //     echo "<br>";

        if ($rows['EMAIL'] == $email) {
            echo "<br>";
            echo "Email is  similar, the user is valid!!";
            echo "<br>";
            header("location: ../userpage.php");
        } else {
            echo "<br>";
            echo "Email is different, the user is not registered properly!";
            echo "<br>";
        }
    }
    ?>
</body>

</html>