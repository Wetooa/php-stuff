<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include_once "../headConfigs.php"
  ?>
  <title>Login</title>
</head>

<body>
  <form class="flex flex-col gap-2" action="../app/loginUser.php" method="POST">
    <div>
      <label for="username">Enter username: </label>
      <input type="text" id="username" name="username" />
    </div>

    <div>
      <label for="password">Enter password: </label>
      <input type="password" id="password" name="password" />
    </div>

    <button type="submit">Enter</button>
  </form>
</body>

</html>