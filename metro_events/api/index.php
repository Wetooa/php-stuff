<?php

declare(strict_types=1);


include_once "./api/constants.php";
include_once "./api/classes.php";
include_once "./api/get.php";
include_once "./api/post.php";
include_once "./api/helper.php";
include_once "./api/middleware.php";


if (isset($_POST["REGISTER"])) {
  registerUser();
}

if (isset($_POST["LOGIN"])) {
  loginUser();
}
