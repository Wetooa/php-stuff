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

  <title>Forum 222</title>
</head>

<body>
  <?php
  include_once 'header.php';
  ?>

  <div class="container">

    <section class="container my-2">
      <form action="index.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Enter title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelpId" placeholder="Life Updates">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Enter body</label>
          <textarea type="text" class="form-control" name="body" id="body" aria-describedby="emailHelpId" placeholder="la naoy uyab guys"></textarea>
        </div>
        <button class="btn btn-primary" type="submit" role="button">Post</button>
      </form>
    </section>

    <?php
    include_once 'api.php';
    echo getPosts();
    ?>
  </div>

  <?php
  include_once 'footer.php';
  ?>

</body>

</html>