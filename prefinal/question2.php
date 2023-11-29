<?php

// obnoxious code #2
function checkDigits($a, $b) {
  return array_intersect(str_split(strval($b)), str_split(strval($a)));
}

echo (checkDigits(21, 51) ? 'true' : 'false') . '<br>';
echo (checkDigits(12, 73) ? 'true' : 'false') . '<br>';
echo (checkDigits(54, 94) ? 'true' : 'false') . '<br>';
echo (checkDigits(11, 82) ? 'true' : 'false') . '<br>';
