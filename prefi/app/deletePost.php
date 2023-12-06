<?php

function deletePost() {
  global $postsPath;
  $postId = $_POST['postId'];

  if (!isAuthenticated())
    return;

  $posts = getPostsData();
  $posts = array_filter($posts, fn($post) => $post["id"] != $postId);

  file_put_contents($postsPath, json_encode($posts, JSON_PRETTY_PRINT));
  echo "
<script>window.location = 'index.php'</script>
";
}