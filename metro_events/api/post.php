<?php


// set up general case try catch blocks later for exception handling

function setAuthToken($user) {
  $authToken = urlencode(base64_encode(serialize($user)));
  setcookie("authToken", $authToken, ONE_DAY * 30);
}

function loginUser() {

  $users = getUsersData();

  $username = $_POST['username'];
  $password = $_POST['password'];

  foreach($users as $user) {
    if($user->getName == $username) {
      if($user->verifyPassword($password)) {
        setAuthToken($user);
      } else {
        throw new Exception("Wrong password!");
      }
    }
  }

}


function registerUser() {
  $users = getUsersData();

  $username = $_POST['username'];
  $password = $_POST['password'];

  foreach($users as $user)
    if($user->getName == $username)
      throw new Exception("Username already exists");

  $users[] = new User($username, $password);
  file_put_contents(USERS_JSON_PATH, json_encode($users, JSON_PRETTY_PRINT));
}


function createEvent() {
  $events = getEventsData();

  $name = $_POST['name'];
  $date = $_POST['date'];
  $organizer = $_POST['organizer'];

  $events[] = new Event($name, $date, $organizer);
  file_put_contents(EVENTS_JSON_PATH, json_encode($events, JSON_PRETTY_PRINT));
}


