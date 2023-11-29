<?php
include_once "helper.php";

$usersPath = './data/users.json';
$postsPath = './data/posts.json';
$commentsPath = './data/comments.json';


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


function getPosts() {

  $users = getUsersData();
  $posts = getPostsData();
  $comments = getCommentsData();
  $postarr = array();

  foreach ($posts as $post) {
    foreach ($users as $user) {
      if ($user['id'] == $post['uid']) {
        $post['uid'] = $user;
        break;
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
              <h5><a href="timeline.html" class="profile-link">' . $parr['uid']['name'] . '</a></h5>
            </div>
            <div class="reaction">
              <!--<a class="btn text-green"><i class="fa fa-thumbs-up"></i> 13</a>
              <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>-->
            </div>
            <div class="line-divider"></div>
            <div class="post-text">
              <h3>' . $parr['title'] . '</h3>
              <p>' . $parr['body'] . '</p>
            </div>

            <section class="my-2">
              <form action="index.php" method="post">
                <div class="mb-3">
                  <h6>Enter comment: </h6>
                  <textarea type="text" class="form-control" name="body" id="body" aria-describedby="emailHelpId" placeholder="la naoy uyab guys"></textarea>
                </div>
                <input style="display: none" value="' . $parr['id'] . '" id="postId" name="postId"></p>
                <button name="createComment" class="btn btn-primary" type="submit" role="button">Comment</button>
              </form>
            </section>

            <div class="line-divider"></div>';

    foreach ($parr['comments'] as $comm) {
      $str .= '<div class="post-comment">
              <img src="https://ui-avatars.com/api/?rounded=true&name=' . $comm['name'] . '" alt="" class="profile-photo-sm">
              <p>' . $comm['body'] . '</p>'
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


$credentials = null;

if (isset($_COOKIE['auth'])) {
  $credentials = unserialize(base64_decode(urldecode($_COOKIE['auth'])));
}

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
