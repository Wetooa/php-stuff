<?php
include_once "helper.php";

$usersPath = './data/users.json';
$postsPath = './data/posts.json';
$commentsPath = './data/comments.json';
$likesPath = './data/likes.json';

$credentials = isset($_COOKIE['auth']) ? unserialize(base64_decode(urldecode($_COOKIE['auth']))) : null;


// function get users from json
function getUsersData() {
  global $usersPath;
  if (!file_exists($usersPath)) {
    echo 1;
    return [];
  }
  $data = file_get_contents($usersPath);
  return json_decode($data, true);
}

// function get posts from json
function getPostsData() {
  global $postsPath;
  if (!file_exists($postsPath)) {
    echo 1;
    return [];
  }
  $data = file_get_contents($postsPath);
  return json_decode($data, true);
}

// function get comments from json
function getCommentsData() {
  global $commentsPath;
  if (!file_exists($commentsPath)) {
    echo 1;
    return [];
  }
  $data = file_get_contents($commentsPath);
  return json_decode($data, true);
}

// function get likes from json
function getLikesData() {
  global $likesPath;
  if (!file_exists($likesPath)) {
    echo 1;
    return [];
  }
  $data = file_get_contents($likesPath);
  return json_decode($data, true);
}


function getPosts($filter = "") {
  global $credentials;
  $users = getUsersData();
  $posts = getPostsData();
  $comments = getCommentsData();
  $likes = getLikesData();
  $postarr = array();


  foreach ($posts as $post) {
    if ($filter && $filter != $post["uid"])
      continue;

    foreach ($users as $user) {
      if ($user['id'] == $post['uid']) {
        $post['uid'] = $user;
        break;
      }
    }

    $post['likes'] = 0;
    $post['dislikes'] = 0;
    $post['state'] = 0;
    foreach ($likes as $like) {
      if ($like['postId'] == $post['id']) {
        if ($like['isLike'])
          ++$post['likes'];
        else
          ++$post['dislikes'];

        if ($credentials && $like['uid'] == $credentials['id']) {
          $post['state'] = $like['isLike'] ? 1 : -1;
        }
      }
    }

    $post['comments'] = array();
    foreach ($comments as $comment) {
      if ($post['id'] == $comment['postId']) {
        $post['comments'][] = $comment;
      }
    }
    $postarr[] = $post;
  }

  $str = "";
  foreach ($postarr as $parr) {
    $str .= '<!-- start of post -->
  <div class="row">
    <div class="col-md-12">
      <div class="post-content">
        <div class="post-container">
          <img src="https://ui-avatars.com/api/?rounded=true&name=' . $parr['uid']['name'] . '" alt="user" class="profile-photo-md pull-left">
          <div class="post-detail">
            <div class="user-info">
              <h5><a href="timeline.php?username=' . $parr['uid']['username'] . '&id=' . $parr['uid']['id'] . '" class="profile-link">' . $parr['uid']['name'] . '</a></h5>
            </div>

            <div class="reaction">
              <form action="index.php" method="POST">
                <input style="display: none" value="' . $parr['id'] . '" name="postId" />
                <button name="likePost" class="btn ' . ($parr['state'] === 1 ? 'text-green' : '') . '"><i class="fa fa-thumbs-up"></i> ' . $parr['likes'] . '</button>
                <button name="dislikePost" class="btn ' . ($parr['state'] === -1 ? 'text-red' : '') . '"><i class="fa fa-thumbs-down"></i> ' . $parr['dislikes'] . '</button>
              </form>
            </div>'

      . '<div class="line-divider"></div>
            <div class="post-text">
              <h3>' . $parr['title'] . '</h3>
              <p>' . $parr['body'] . '</p>
            </div>
            ' .

      (($credentials != null && $parr['uid']['id'] == $credentials['id']) ?
        '<div><form method="POST" action="index.php">
                    <input style="display: none" name="postId" value="' . $parr["id"] . '"/>
                    <button name="deletePost" type="submit" class="btn btn-secondary my-2">Delete</button>
                  </form></div>' : '') .

      '  <section class="p-2 container">
              <form style="display: flex; flex-direction: column; align-items: end" action="index.php" method="post">
                <div style="width: 100%" class="mb-3">
                  <h6>Enter comment: </h6>
                  <textarea type="text" class="form-control" name="body" id="body" aria-describedby="emailHelpId" placeholder="Enter comment here..."></textarea>
                </div>
                <input style="display: none" value="' . $parr['id'] . '" id="postId" name="postId"></p>
                <button name="createComment" class="btn btn-primary" style="width: fit-content" type="submit" role="button">Comment</button>
              </form>
            </section>

            <div class="line-divider"></div>';

    foreach ($parr['comments'] as $comm) {
      $str .= '<div class="post-comment p-2" style="display: flex; align-items: center">
              <img src="https://ui-avatars.com/api/?rounded=true&name=' . $comm['name'] . '" alt="" class="profile-photo-sm">
              <p style="height: fit-content">' . $comm['body'] . '</p>' .
        (($credentials != null && $comm['email'] == $credentials['email']) ?
          '<form style="margin-left: auto" method="POST" action="index.php">
                      <input style="display: none" name="commentId" value="' . $comm["id"] . '"/>
                      <button name="deleteComment" type="submit" class="btn btn-secondary my-2">Delete</button>
                    </form>' : '')

        . '</div>';
    }


    $str .= '</div>
          </div>
        </div>
    </div>
  </div>';
  }
  return $str;
}


include_once "createComment.php";
include_once "createPost.php";
include_once "loginUser.php";
include_once "registerUser.php";
include_once "logoutUser.php";
include_once "deletePost.php";
include_once "deleteComment.php";
include_once "deleteUserAccount.php";
include_once "reaction.php";

if (isset($_POST['loginUser'])) {
  loginUser();
}

if (isset($_POST['registerUser'])) {
  registerUser();
}

if (isset($_POST['createPost'])) {
  createPost();
}

if (isset($_POST['createComment'])) {
  createComment();
}

if (isset($_POST['logoutUser'])) {
  logoutUser();
}

if (isset($_POST['deletePost'])) {
  deletePost();
}

if (isset($_POST['deleteComment'])) {
  deleteComment();
}

if (isset($_POST['deleteUserAccount'])) {
  deleteUserAccount();
}

if (isset($_POST['likePost'])) {
  likePost();
}

if (isset($_POST['dislikePost'])) {
  dislikePost();
}




