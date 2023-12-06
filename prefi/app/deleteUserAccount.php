<?php

function deleteUserAccount() {

  global $usersPath;

  if (!isAuthenticated())
    return;

  $userId = $_POST['userId'];
  $users = getUsersData();
  $users = array_filter($users, fn($user) => $user["id"] != $userId);

  file_put_contents($usersPath, json_encode($users, JSON_PRETTY_PRINT));
  echo "
<script>window.location = 'index.php'</script>
";

}
