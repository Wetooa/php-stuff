<?php

function deleteComment() {
  global $commentsPath;
  $commentId = intval($_POST['commentId']);

  if (!isAuthenticated())
    return;

  $comments = getCommentsData();
  $comments = array_filter($comments, fn($comment) => $comment["id"] != $commentId);

  file_put_contents($commentsPath, json_encode($comments, JSON_PRETTY_PRINT));
  echo "
<script>window.location = 'index.php'</script>
";
}