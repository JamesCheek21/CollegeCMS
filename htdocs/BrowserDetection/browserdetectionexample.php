<?php
  $browser = $_SERVER['HTTP_USER_AGENT'];

  echo "<p>The full HTTP_USER_AGENT string is: " . $browser . "</p>";

  if (strpos($browser, "MSIE") == true)
  {
    echo "You are using Internet Explorer";
  }
  else if (strpos($browser, "Firefox") == true)
  {
    echo "You are using Mozilla Firefox";
  }
  else if (strpos($browser, "Gecko") == true)
  {
    echo "You are using Google Chrome";
  }
  else
  {
    echo "You are not using IE, Firefox or Chrome";
  }
?>
