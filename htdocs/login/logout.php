<?php
  //brings over the old session... but then destroys it. Thus not logged in any longer.
  session_start();
  session_destroy();
?>
<html>
  <body>
    <h1>You have successfully logged out!</h1>
    <p>Your session has been destroyed... but we won't tell our website users this!</p>
  </body>
</html>
