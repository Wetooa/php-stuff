<?php


function likePost() {
  global $likesPath;
  global $credentials;

  if (!isAuthenticated())
    return;

  $likes = getLikesData();
  $newLikes = $likes;
  $postId = $_POST['postId'];

  foreach ($likes as $like) {
    if ($like['postId'] == $postId) {

      // if user likes the post, then his like disappears
      $newLikes = array_filter($likes, fn($like) => $like['postId'] != $postId);
      if ($like['isLike']) {
        file_put_contents($likesPath, json_encode($newLikes, true));
        return;
      }

    }
  }

  // else his like is created
  $newLikes[] = array(
    'postId' => $postId,
    'uid' => $credentials['id'],
    'isLike' => true,
  );
  file_put_contents($likesPath, json_encode($newLikes, true), JSON_PRETTY_PRINT);
  header("Location: index.php");

}

function dislikePost() {
  global $likesPath;
  global $credentials;

  if (!isAuthenticated())
    return;

  $likes = getLikesData();
  $newLikes = $likes;
  $postId = $_POST['postId'];

  foreach ($likes as $like) {
    if ($like['postId'] == $postId) {

      // if user dislikes the post, then his dislike disappears
      $newLikes = array_filter($likes, fn($like) => $like['postId'] != $postId);
      if (!$like['isLike']) {
        file_put_contents($likesPath, json_encode($newLikes, true), JSON_PRETTY_PRINT);
        return;
      }

    }
  }

  // else his dislike is created
  $newLikes[] = array(
    'postId' => $postId,
    'uid' => $credentials['id'],
    'isLike' => false,
  );
  file_put_contents($likesPath, json_encode($newLikes, true));
  header("Location: index.php");
}

