<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  include_once "../headConfigs.php"
  ?>
  <title>Register</title>
</head>

<body>
  <form class="flex gap-2 flex-col" action="../app/registerUser.php" method="POST">
    <div>
      <label for="username">Enter username: </label>
      <input type="text" id="username" name="username" />
    </div>

    <div>
      <label for="email">Enter email: </label>
      <input type="email" id="email" name="email" />
    </div>

    <div>
      <label for="password">Enter password: </label>
      <input type="password" id="password" name="password" />
    </div>

    <div>
      <label for="password">Enter re-enter password: </label>
      <input type="password" id="password2" name="password2" />
    </div>

    <button type="submit">Enter</button>
  </form>
</body>

</html>