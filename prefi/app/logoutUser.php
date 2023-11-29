<?php

function logoutUser() {
  setcookie("auth", "", time());
  header("Location: ./index.php", true, 301);
}