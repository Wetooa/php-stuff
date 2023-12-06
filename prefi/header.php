<header class="p-3 text-bg-dark">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <!-- <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a> -->

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
        <li><a href="/" class="nav-link px-2 text-white">Posts</a></li>
      </ul>


      <div class="text-end">
        <form action="index" method="POST">
          <a href="login.php" class="btn btn-outline-light me-2">Login</a>
          <a href="register.php" class="btn btn-outline-light m-2">Sign-up</a>
          <button name="logoutUser" class="btn btn-warning m-2">Logout</button>
          <button name="deleteUserAccount" class="btn btn-warning m-2">Delete
            Account</button>

          <input style="display: none" name="userId" value="<?php echo $credentials["id"] ?>" />
        </form>
      </div>


      <?php
      if ($credentials) {
        echo '<div class="container text-center"><h4>Signed in as ' . $credentials["username"] . '</h4></div>';
      }
      ?>

    </div>
  </div>
</header>