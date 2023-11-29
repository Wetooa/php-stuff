<?php

if (!isset($_POST['message']) || !isset($_POST['auth'])) {
  header("Location: http://www.localhost:8000/", true, 400);
}


