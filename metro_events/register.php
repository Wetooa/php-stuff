<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once "./configs/headConfigs.php" ?>

  <title>Register</title>
</head>

<body>

  <?php include_once "./left_sidebar.php" ?>

  <main>

    <h4 class="text-3xl font-bold">
      Register
    </h4>

    <form action="index.php" method="POST">

      <label for="firstname">Enter firstname</label>
      <input type="text" id="firstname" name="firstname" />

      <label for="lastname">Enter lastname</label>
      <input type="text" id="lastname" name="lastname" />

      <label for="email">Enter email</label>
      <input type="email" id="email" name="email" />

      <label for="location">Enter location</label>
      <input type="location" id="location" name="location" />

      <label for="username">Enter username</label>
      <input type="text" id="username" name="username" />

      <label for="password">Enter password</label>
      <input type="password" id="password" name="password" />

      <label for="password">Retype password</label>
      <input type="password" id="password2" name="password2" />

      <button type="submit" name="REGISTER">Register</button>

    </form>

  </main>

  <?php include_once "./right_sidebar.php" ?>
</body>

</html>