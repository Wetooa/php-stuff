<?php

function authenticationMiddleware($next) {
  try {
    getCredentials();
    $next();
  } catch (Throwable $th) {
    echo $th;
  }
}