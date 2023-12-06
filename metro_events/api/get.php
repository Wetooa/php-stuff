<?php


function getUsersData() {
  if(!file_exists(USERS_JSON_PATH))
    throw new Exception("File not found!");

  return json_decode(file_get_contents(USERS_JSON_PATH));
}

function getEventsData() {
  if(!file_exists(EVENTS_JSON_PATH))
    throw new Exception("File not found!");

  return json_decode(file_get_contents(EVENTS_JSON_PATH));
}

function getCredentials() {
  $authToken = $_COOKIE['authToken'];

  $authToken = urldecode($authToken);
  $authToken = base64_decode($authToken);
  $authToken = unserialize($authToken);

  return $authToken;
}