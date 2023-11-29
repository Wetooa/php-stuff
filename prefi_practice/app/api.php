


<?php

$usersPath = '../data/users.json';
$postsPath = '../data/posts.json';
$commentsPath = '../data/comments.json';

function getPostsData() {
  global $postsPath;
  if (!file_exists($postsPath)) return [];
  return json_decode(file_get_contents($postsPath), true);
}

function getUsersData() {
  global $usersPath;
  if (!file_exists($usersPath)) return [];
  return json_decode(file_get_contents($usersPath), true);
}

function getCommentsData() {
  global $commentsPath;
  if (!file_exists($commentsPath)) return [];
  return json_decode(file_get_contents($commentsPath), true);
}


function displayPosts() {
  $usersData = getUsersData();
  $postsData = getPostsData();
  $commentsData = getCommentsData();

  $result = "";
  $creator = "";

  foreach ($postsData as $post) {
    foreach ($usersData as $user) {
      if ($post["uid"] == $user["id"]) $creator = $user["username"];
    }

    $result += '<div><h4>' . $creator . '</h4><h5>' . $post["title"] . '</h5><p>' . $post["message"] . '</p>';

    foreach ($commentsData as $comment) {
      if ($comment["post_id"] == $post["id"]) {
        foreach ($usersData as $user) {
          if ($comment["uid"] == $user["id"]) $creator = $user["username"];
        }
        $result += '<div><h4>' . $creator . '</h4><h5>' . $post["title"] . '</h5><p>' . $post["message"] . '</p></div>';
      }
    }
    
    $result += '</div>';
  }

  echo $result;
}

function setCredentials($username, $password) {
  $usersData = getUsersData();

  foreach ($usersData as $user) {
    if ($username == $user["username"] && $user["password"] == $password) {
      $authCookie = urlencode(base64_encode(serialize($user)));
      setcookie("auth", $authCookie, time() + 86400 * 30, "/");
      header("Location: http://www.localhost:8000/", true, 301);
    }
  }
}

include_once "helper.php";