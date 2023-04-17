<?php
$file = "counter.txt"; // the name of the file to store the counter
$count = file_get_contents($file); // get the current count from the file
echo "You are visitor number $count."; // display the updated count