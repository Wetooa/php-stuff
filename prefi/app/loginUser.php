<?php



function loginUser() {

  global $credentials;
  $users = getUsersData();


  foreach ($users as $user) {
    if ($user['username'] == $_POST["username"]) {
      $credentials = $user;
      $loginCookie = urlencode(base64_encode(serialize($user)));
      setcookie('auth', $loginCookie, time() + (86400 * 30), "/");
    }
  }

  header("Location: ../index.php", true, 301);

}