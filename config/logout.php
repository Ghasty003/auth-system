<?php

if (!isset($_GET['logout'])) {
    header("Location: ../index.php");
    exit();
}

session_start();
session_unset();
header("Location: ../pages/login.php");
