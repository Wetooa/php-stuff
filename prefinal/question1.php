<?php

// obnoxious code #1
function cutOut($line) {
  return implode(" ", array_filter(preg_split('/[ ,.]/', $line), fn($x) => strlen($x) > 2 && strlen($x) < 7));
}


echo cutOut("Not the Sharpest Tool in the Shed") . '<br>';
echo cutOut("A Fool and His Money are Soon Parted") . '<br>';
echo cutOut("Don't Count Your Chickens Before They Hatch") . '<br>';
echo cutOut("If You Can't Stand the Heat, Get Out of the Kitchen") . '<br>';
