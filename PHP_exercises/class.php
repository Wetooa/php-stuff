<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  class People
  {
    public $name;
    public $age;

    public function __construct($name, $age)
    {
      $this->name = $name;
      $this->age = $age;
    }

    public function __toString()
    {
      return "Name: $this->name <br> Age: $this->age";
    }

    public function greet()
    {
      echo "Hi! My name is $this->name! I'm $this->age years old. Pleased to meet you! <br>";
    }
  }

  class Teacher extends People
  {
    public $salary;

    public function teach()
    {
      echo "I'm teaching right now!";
    }
  }

  $p = new People("Benny", 10);
  echo $p . "<br>";
  $p->greet();


  $t = new Teacher("John", 12);
  echo $t . "<br>";
  $t->greet();
  $t->teach();


  ?>
</body>

</html>