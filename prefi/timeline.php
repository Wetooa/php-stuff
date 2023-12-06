<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "./configs/headConfig.php" ?>
  <title>
    <?php echo $_REQUEST["username"]
      . '\''; ?>s Timeline
  </title>
</head>

<body>
  <?php include_once './app/api.php'; ?>
  <?php include_once 'header.php'; ?>

  <div class="container my-4">
    <?php echo getPosts($_REQUEST["id"]) ?>
  </div>

  <?php include_once 'footer.php'; ?>
</body>

</html>