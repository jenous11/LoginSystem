<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "<p>"."Welcome ".$_SESSION['username']." to your personal page!! </p>";
        echo "<a href='logout.php'><button>logout</button></a>";
    }
    else{
        header('Location: registration.php ');
    }
    ?>
