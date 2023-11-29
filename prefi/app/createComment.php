<?php

function createComment() {
  global $credentials;
  global $commentsPath;

  $comments = getCommentsData();
  $new_id = getMaxId($comments);

  $comments[] = array(
    "postId" => $_POST["postId"],
    "id" => $new_id,
    "name" => $credentials["name"],
    "email" => $credentials["email"],
    "body" => $_POST["body"],
  );

  file_put_contents($commentsPath, json_encode($comments, JSON_PRETTY_PRINT));
  echo "
  <script>window.location = 'index.php'</script>
  ";
}