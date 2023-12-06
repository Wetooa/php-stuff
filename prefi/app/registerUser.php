<?php


function registerUser() {
  global $usersPath;
  global $credentials;
  $users = getUsersData();

  $new_id = getMaxId($users);
  foreach ($users as $user) {
    if ($user['username'] == $_POST["username"]) {
      echo "Already registered!";
      return;
    }
  }

  $newUser = array(
    "id" => $new_id,
    "name" => $_POST["name"],
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "address" => array(
      "street" => $_POST["street"],
      "barangay" => $_POST["barangay"],
      "city" => $_POST["city"],
    )
  );

  $users[] = $newUser;
  file_put_contents($usersPath, json_encode($users, JSON_PRETTY_PRINT));

  loginUser();

  // header("Location: ../index.php", true, 301);
}