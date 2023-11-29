<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='styles.css'>

  <title>Register</title>
</head>


<body>
  <div class="container">
    <h3>Register</h3>
    <form action="index.php" method="post">
      <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelpId" placeholder="Adrian">
        <small id="emailHelpId" class="form-text text-muted">Help text</small>
        <div class="mb-3">
          <label for="" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelpId" placeholder="abc@mail.com">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Street</label>
          <input type="text" class="form-control" name="street" id="street" aria-describedby="emailHelpId" placeholder="abc@mail.com">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Barangay</label>
          <input type="text" class="form-control" name="barangay" id="barangay" aria-describedby="emailHelpId" placeholder="abc@mail.com">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">city</label>
          <input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelpId" placeholder="abc@mail.com">
          <small id="emailHelpId" class="form-text text-muted">Help text</small>
        </div>
        <button class="btn btn-primary" type="submit" role="button">Login</button>
    </form>
  </div>
</body>

</html>