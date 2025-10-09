<?php
session_start();
    echo "<p>"."Welcome ".$_SESSION['email']." to your personal page!!</p>";
    echo "<a href='logout.php'><button>logout</button></a>";

