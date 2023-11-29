<?php

include_once "./api.php";

if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['password2'])) {
  header('Location: https://www.localhost:8000/auth/registerPage.php', true, 400);
}

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

if ($password != $password2) {
  header('Location: https://www.localhost:8000/auth/registerPage.php', true, 400);
}

$usersData = getUsersData();


$usersData[] = array(
  "id" => getMaxId($usersData),
  "username" => $username,
  "email" => $email,
  "password" => $password,
);


file_put_contents($usersPath, json_encode($usersData, JSON_PRETTY_PRINT));
setCredentials($username);