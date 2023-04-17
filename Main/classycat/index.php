<?php
$cookie_name = "visited";
$cookie_value = "userHasVisited";
if (!isset($_COOKIE[$cookie_name])) {
  $file = "counter.txt"; // the name of the file to store the counter
  $count = file_get_contents($file); // get the current count from the file
  $count++; // increment the count
  file_put_contents($file, $count); // save the new count back to the file
  // echo "You are visitor number $count."; // display the updated count
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
  // echo "Cookie Saved";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="refresh" content="0; url=https://discord.com/invite/UrQ2aqzBjg" />
  <title>Redirect</title>
</head>

<body>Redirecting</body>

</html>