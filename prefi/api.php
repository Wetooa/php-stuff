<?php

$usersJSON = './data/users.json';
$postsJSON = './data/posts.json';
$commentsJSON = './data/comments.json';

$isLoggingIn = isset($_POST["username"]);
$isRegistering = $isLoggingIn && isset($_POST["name"]);

function getMaxId($array)
{
  $new_id = 0;
  foreach ($array as $item) {
    $new_id = max($new_id, $item['id'] + 1);
  }
  return $new_id;
}

if ($isRegistering) {
  $users = getUsersData();

  $new_id = getMaxId($users);
  foreach ($users as $user) {
    if ($user['username'] == $_POST["username"]) {
      echo "Already registered!";
      return;
    }
  }

  $users[] = array(
    "id" => $new_id,
    "name" => $_POST["name"],
    "username" => $_POST["username"],
    "address" => array(
      "street" => $_POST["street"],
      "barangay" => $_POST["barangay"],
      "city" => $_POST["city"],
    )
  );

  file_put_contents($usersJSON, json_encode($users, JSON_PRETTY_PRINT));
} elseif ($isLoggingIn) {
  $users = getUsersData();
  foreach ($users as $user) {
    if ($user['username'] == $_POST["username"]) {
      $loginCookie = urlencode(base64_encode(serialize($user)));
      setcookie('auth', $loginCookie, time() + (86400 * 30), "/");
    }
  }
}

$credentials = null;

if (isset($_COOKIE['auth'])) {
  $credentials = unserialize(base64_decode(urldecode($_COOKIE['auth'])));
}

$isCreatingPost = $credentials != null && isset($_POST['body']);
$isCommenting = $isCreatingPost && isset($_POST['postId']);

if ($isCommenting) {
  $comments = getCommentsData();
  $new_id = getMaxId($comments);

  $comments[] = array(
    "postId" => $_POST["postId"],
    "id" => $new_id,
    "name" => $credentials["name"],
    "email" => $credentials["email"],
    "body" => $_POST["body"],
  );

  var_dump($posts);

  file_put_contents($commentsJSON, json_encode($comments, JSON_PRETTY_PRINT));
  echo "
  <script>window.location = 'index.php'</script>
  ";
} elseif ($isCreatingPost) {

  $posts = getPostsData();
  $new_id = getMaxId($posts);

  $posts[] = array(
    "uid" => $credentials["id"],
    "id" => $new_id,
    "title" => $_POST['title'],
    "body" => $_POST["body"],
  );

  file_put_contents($postsJSON, json_encode($posts, JSON_PRETTY_PRINT));
  echo "
  <script>window.location = 'index.php'</script>
  ";
}


// function get users from json
function getUsersData()
{
  global $usersJSON;
  if (!file_exists($usersJSON)) {
    echo 1;
    return [];
  }

  $data = file_get_contents($usersJSON);
  return json_decode($data, true);
}

// function get posts from json
function getPostsData()
{
  global $postsJSON;
  if (!file_exists($postsJSON)) {
    echo 1;
    return [];
  }

  $data = file_get_contents($postsJSON);
  return json_decode($data, true);
}

// function get comments from json
function getCommentsData()
{
  global $commentsJSON;
  if (!file_exists($commentsJSON)) {
    echo 1;
    return [];
  }

  $data = file_get_contents($commentsJSON);
  return json_decode($data, true);
}


function getPosts()
{

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

            <section class="container my-2">
              <form action="index.php" method="post">
                <div class="mb-3">
                  <label for="" class="form-label">Enter comment</label>
                  <textarea type="text" class="form-control" name="body" id="body" aria-describedby="emailHelpId" placeholder="la naoy uyab guys"></textarea>
                </div>
                <input style="display: none" value="' . $parr['id'] . '" id="postId" name="postId"></p>
                <button class="btn btn-primary" type="submit" role="button">Comment</button>
              </form>
            </section>

            <div class="line-divider"></div>';

    foreach ($parr['comments'] as $comm) {
      $str .=  '<div class="post-comment">
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
