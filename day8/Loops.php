<?php

$age = 10;
$team = ["RCB", "MI", "CSK"];

if ($age < 18) {
    echo "You are not eligibale for the voting " . "<br/>";
} elseif ($age > 18) {
    echo "You are eligibale for the voting " . "<br/>";
} else {
    echo "please enter your age " . "<br/>";
}

// ------------
echo "<br/>" . "for loop: " . "<br/>";
for ($i = 0; $i < 18; $i++) {
    echo "Your age is Now: " . $i . "<br/>";
}

// -------------
echo "<br/>" . "foreach loop: " . "<br/>";
foreach ($team as $each) {
    if ($each == "CSK") continue;
    echo "each team: " . $each . "<br/>";
}

// -------------
echo "<br/>" . "While loop: " . "<br/>";
while ($age <= 15) {
    echo "your age is: " . $age . "<br/>";
    if ($age == 14) break;
    $age++;
}
// ------------

echo "<br/>" . "do while loop: ";
do {
    echo " Hello from the do" . "<br/>";
    $age++;
} while ($age <= 15);

// -------------

echo "<br/>" . "Switch case: ";
switch ($myage = 20) {
    case $myage < 18:
        echo "Your age is less then 18";
        break;
    case $myage <= 50:
        echo "Your age is between 18 to 50";
        break;
    case $myage > 18:
        echo "Your age is above 50";
        break;
}
