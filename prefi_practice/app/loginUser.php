<?php

include_once "./api.php";

if (!isset($_POST['username']) || !isset($_POST['password'])) {
  header("Location: http://www.localhost:8000/auth/loginPage.php", true, 400);
}

$username = $_POST["username"];
$password = $_POST["password"];

setCredentials($username, $password);
