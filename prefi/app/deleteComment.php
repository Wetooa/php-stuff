<?php

function deleteComment() {
  $postId = $_POST['postId'];

  $posts = getPostsData();
  $posts = array_filter($posts, fn($key => $value) => return $key != $postId; );
}