<?php


enum Privilege {
  case Administrator;
  case Organizer;
  case User;
}

class User {

  private $username;
  private $password;
  private $privilege = Privilege::User;

  protected function __construct($username, $password) {
    $this->username = $username;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function __toString() {
    return "Username: ".$this->username."<br>Password: ".$this->password;
  }

  protected function getUsername() {
    return $this->username;
  }

  protected function verifyPassword($password) {
    return password_verify($password, $this->password);
  }

  protected function getPrivilege() {
    return $this->privilege;
  }

}


class Event {

  private $name;
  private $date;
  private $organizer;


  protected function __construct($name, $date, $organizer) {
    $this->name = $name;
    $this->date = $date;
    $this->organizer = $organizer;
  }

}