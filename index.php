<?php

session_start();

if (empty($_SESSION['username'])) {
    header("Location: ./pages/login.php");
    exit();
}

$username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./config/logout.php" method="get">
        <button name="logout">Logout</button>
    </form>
    <h1>Dashboard.</h1>
    <h2>Weclome, <?php echo $username ?></h2>
</body>

</html>