<?php

function createPost() {
  global $credentials;
  global $postsPath;

  $posts = getPostsData();
  $new_id = getMaxId($posts);

  $posts[] = array(
    "uid" => $credentials["id"],
    "id" => $new_id,
    "title" => $_POST['title'],
    "body" => $_POST["body"],
  );

  file_put_contents($postsPath, json_encode($posts, JSON_PRETTY_PRINT));
  echo "
<script>window.location = 'index.php'</script>
";
}