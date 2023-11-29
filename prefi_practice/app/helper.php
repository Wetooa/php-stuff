<?php

function getMaxId($arrayData) {
  $maxId = 0;
  foreach ($arrayData as $data) {
    $maxId = max($maxId, $data['id'] + 1);
  }
  return $maxId;
}

