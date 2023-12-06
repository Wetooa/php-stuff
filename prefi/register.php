<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "./configs/headConfig.php" ?>
  <title>Register</title>
</head>


<body>
  <?php include_once "./app/api.php" ?>
  <?php include_once "./header.php" ?>

  <main class="container">
    <h3>Register</h3>

    <form action="index.php" method="POST">
      <div class="mb-3">
        <label for="" class="form-label">Name </label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelpId"
          placeholder="Adrian">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid name</small>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelpId"
          placeholder="AdrianGwapo">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid username</small>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
          placeholder="adrian@mail.com">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid email</small>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Street</label>
        <input type="text" class="form-control" name="street" id="street" aria-describedby="emailHelpId"
          placeholder="Purok">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid street</small>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Barangay</label>
        <input type="text" class="form-control" name="barangay" id="barangay" aria-describedby="emailHelpId"
          placeholder="Tungkop">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid barangay</small>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">city</label>
        <input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelpId" placeholder="Cebu">
        <small id="emailHelpId" class="form-text text-muted">Enter a valid city</small>
      </div>

      <button name="registerUser" class="btn btn-primary" type="submit" role="button">Register</button>
    </form>
  </main>

  <?php include_once "./footer.php" ?>
</body>

</html>