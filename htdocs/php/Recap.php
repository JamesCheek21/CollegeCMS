<html>
  <head>
  </head>
  <body>
    <?php
      $carMake = "Fiat";
      $carModel = "500";
      $carEngine= "2l";
      $carColour = "Red";
      $carPrice = 1500;

      function factorial($p)
      {
        if ($p == 0)
        {
          return 1;
        }
        else {
          return $p * factorial($p-1);
        }
      }

      if($carPrice < 1000)
      {
        echo "<h1>Cheap Car For Sale</h1>";
      }
      else
      {
        echo "<h1> Car For Sale</h1>";
      }

      echo "A " . $carColour . " " . $carMake . " " . $carModel . " with a " . $carEngine . " engine. Price £" . $carPrice . " ONO.";

      echo "<br>" . factorial(3);
    ?>
  </body>
</html>
