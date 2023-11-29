<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include_once "headConfigs.php"
  ?>
  <title>Facebook Old</title>
</head>

<?php
include_once "./app/api.php"
?>

<body class="flex flex-col min-h-screen">
  <?php
  include_once "navbar.php";
  ?>

  <main class="flex-1">

    <form action="./app/createPost.php">
      <div>
        <label for="title">Enter title: </label>
        <input type="text" id="title" name="title"/>
      </div>
      <div>
        <label for="message">Enter message: </label>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Send a message..."></textarea>
      </div>

      <button type="submit" class="bg-blue-200 hover:bg-blue-300 transition-all p-1 rounded-lg">Create</button>
    </form>

    <h3>Posts Here</h3>
    <?php
      displayPosts();
    ?>
  </main>

  <?php
  include_once "footer.php";
  ?>
</body>

</html>