<?php


include "./db.php";

if (!isset($_POST['login-submit'])) {
    header("Location: ../pages/login.php");
    exit();
}

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

if (empty($username)) {
    header("Location: ../pages/login.php?error=Enter username");
    exit();
}

if (empty($password)) {
    header("Location: ../pages/login.php?error=Enter password");
    exit();
}

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/login.php?error=sqlerror");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$rows = mysqli_fetch_assoc($result);

if (!$rows) {
    header("Location: ../pages/login.php?error=user does not exist");
    exit();
}


$verifyPass = password_verify($password, $rows['password']);

if (!$verifyPass) {
    header("Location: ../pages/login.php?error=invalid password");
    exit();
}

session_start();

$_SESSION['username'] = $username;

header("Location: ../index.php");

mysqli_stmt_close($stmt);
mysqli_close($conn);
