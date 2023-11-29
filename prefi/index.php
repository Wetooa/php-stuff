<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "./configs/headConfig.php" ?>
  <title>Forum 222</title>
</head>

<body>
  <?php include_once './app/api.php'; ?>
  <?php include_once 'header.php'; ?>

  <div class="container">

    <section class="container my-2">
      <form action="index.php" method="POST">
        <div class="mb-3">
          <label for="" class="form-label">Enter title: </label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelpId"
            placeholder="Life Updates">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Enter body</label>
          <textarea type="text" class="form-control" name="body" id="body" aria-describedby="emailHelpId" rows="10"
            cols="10" placeholder="This is a new message..."></textarea>
        </div>
        <button name="createPost" class="btn btn-primary" type="submit" role="button">Post</button>
      </form>
    </section>

    <?php echo getPosts() ?>
  </div>

  <?php include_once 'footer.php'; ?>
</body>

</html>