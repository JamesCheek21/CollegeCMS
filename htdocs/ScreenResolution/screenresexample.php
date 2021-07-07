<?php
    //if h & w parameters within the URL are not set, creat a new URL with parameters.
    //if they are set, then display their content on-screen.
    if (!isset($_GET['width']) || !isset($_GET['height']))
    {
      echo
      "<script>
        document.location=\"$PHP_SELF?width=\"+screen.width+\"&height=\"+screen.height;
      </script>";
    }
    else
    {
      echo "The screen resolution is " . $_GET['width'] . " x " . $_GET['height'];
    }
?>
