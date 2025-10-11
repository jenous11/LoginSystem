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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    echo "<br>";
    //main logic
    foreach ($results as $rows) {
        if ($rows['EMAIL'] == $_SESSION['email2']) {
            if (password_verify($password2, $rows['user_password'])) {
                header("location: ../userpage.php");
            } else {
                header("locaton: ../login.php");
            }
        } else {
            echo "<br>";
            echo '<p class="text-danger d-flex justify-content-center">Invalid Email or Password!</p>';
            echo "<br>";
        }
    }
    ?>
</body>
</html>