<?php

include "./db.php";

if (!isset($_POST['signup-submit'])) {
    header("Location: ../pages/signup.php");
    exit();
}


$errors = ["email" => '', "password" => '', "username" => ''];

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


if (empty($email)) {
    $errors['email'] = "Enter a valid emai address";
    header("Location: ../pages/signup.php?error=$errors");
    exit();
}

if (empty($username)) {
    $errors['username'] = "Enter username";
    header("Location: ../pages/signup.php?error=$errors");
    exit();
}

if (empty($password)) {
    $errors["password"] = "Enter password";
    header("Location: ../pages/signup.php?error=$errors");
    exit();
}

if (strlen($password) < 6) {
    $errors["password"] = "Password should be more than 6 characters";
    header("Location: ../pages/signup.php?error=$errors");
    exit();
}

if (strlen($username) < 2) {
    $errors["username"] = "Username should be atleast 2 characters";
    header("Location: ../pages/signup.php?error=$errors");
    exit();
}


$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/signup.php?error=sqlerror");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$result = mysqli_stmt_num_rows($stmt);

if ($result > 0) {
    $errors['username'] = "Username is already taken";
    header("Location: ../pages/signup.php?error=$errors");
    exit();
}

$sql = "INSERT INTO users (email, username, u_password) VALUES (?, ?, ? )";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../pages/signup.php?error=sqlerror");
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPassword);
mysqli_stmt_execute($stmt);

header("Location: ../pages/signup.php?m=success");


mysqli_stmt_close($stmt);
mysqli_close($conn);
