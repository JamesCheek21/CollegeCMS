<?php
  //brings over the old session... but then destroys it. Thus not logged in any longer.
  session_start();
  session_destroy();
?>
<html>
  <head>
    <link rel="stylesheet" href="stylesheet.css" >
  <body>
    <h1>You have successfully logged out!</h1>
    
  </body>
</html>
