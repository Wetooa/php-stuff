<?php
declare(strict_types=1);

enum Privilege
{
  case Administrator;
  case Organizer;
  case User;
}

class User
{

  public $firstName;
  public $lastName;
  public $email;
  public $location;

  private $username;
  private $password;
  private $privilege = Privilege::User;

  protected function __construct($registerObj) {
    $this->firstName = $registerObj["firstName"];
    $this->lastName = $registerObj["lastName"];
    $this->email = $registerObj["email"];
    $this->location = $registerObj["location"];
    $this->username = $registerObj["username"];

    $this->password = password_hash($registerObj["password"], PASSWORD_DEFAULT);
  }

  public function __toString() {
    return "Username: " . $this->username . "<br>Password: " . $this->password;
  }

  protected function getUsername() {
    return $this->username;
  }

  protected function verifyPassword($password) {
    return password_verify($password, $this->password);
  }

  protected function getPrivilege(): Privilege {
    return $this->privilege;
  }

  protected function setPrivilege(Privilege $newPrivilege) {
    $this->privilege = $newPrivilege;
  }
}


class Event
{

  private $name;
  private $date;
  private $organizer;


  protected function __construct($name, $date, $organizer) {
    $this->name = $name;
    $this->date = $date;
    $this->organizer = $organizer;
  }

}