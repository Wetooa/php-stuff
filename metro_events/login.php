<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once "./configs/headConfigs.php" ?>
  <title>Login</title>

</head>

<body>
  <?php include_once "./left_sidebar.php" ?>

  <main>
    <h4 class="text-3xl font-bold">
      Login
    </h4>

    <form action="index.php" method="POST">

      <label for="username">Enter username</label>
      <input placeholder="ex. Wetooa" type="text" id="username" name="username" />

      <label for="password">Enter password</label>
      <input placeholder="ex. 12345" type="password" id="password" name="password" />

      <button type="submit" name="LOGIN">Login</button>
    </form>

  </main>

  </section>

  <?php include_once "./right_sidebar.php" ?>
</body>

</html>