<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
</head>
  <body>
    <h1>Choose an instrument to edit</h1>

    <?php
      include('dbconn.php');

      #retrieves data from instrument table
      $sql = "SELECT instrumentID, instrumentName FROM instruments;";
      $rs = mysqli_query($con, $sql);

      #for each row in the table use id to create hyperlink to edit form and use drink name to create a text based link
      while($row = mysqli_fetch_array($rs))
      {
        echo "<p>";
        echo "<a href='editform.php?instrumentID=" . $row['instrumentID']. "'>";
        echo $row['instrumentName'];
        echo "</a>";
        echo "</p>";
      }
    ?>
	</body>
</html>
