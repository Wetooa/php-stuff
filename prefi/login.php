<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "./configs/headConfig.php" ?>
  <title>Login</title>
</head>

<body>
  <?php include_once "./app/api.php" ?>
  <?php include_once "./header.php" ?>

  <main class="container">
    <h3>Login</h3>
    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelpId"
          placeholder="Wetooa">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid username</small>
      </div>
      <button name="loginUser" class="btn btn-primary" type="submit" role="button">Login</button>
    </form>
  </main>

  <?php include_once "./footer.php" ?>
</body>

</html>