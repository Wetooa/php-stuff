<?php

function getMaxId($array) {
  $new_id = 0;
  foreach ($array as $item) {
    $new_id = max($new_id, $item['id'] + 1);
  }
  return $new_id;
}

function isAuthenticated() {
  global $credentials;

  if ($credentials == null) {
    echo "User must be authenticated";
    return false;
  }

  return true;

}

?>