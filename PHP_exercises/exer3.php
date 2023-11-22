<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $x = 8;

  echo "Value is now $x <br>";
  $x += 2;
  echo "Add 2. " . "Value is now $x <br>";
  $x -= 4;
  echo "Subtract 4. " . "Value is now $x <br>";
  $x *= 5;
  echo "Multiply by 5. " . "Value is now $x <br>";
  $x /= 3;
  echo "Divide by 3. " . "Value is now $x <br>";
  ++$x;
  echo "Increment value by one. " . "Value is now $x <br>";
  --$x;
  echo "Decrement value by one. " . "Value is now $x <br>";

  ?>
</body>

</html>