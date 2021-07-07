<html>
<head>
	<title>Delete Form</title>
	<link rel="stylesheet" href="stylesheet.css">
</head>
  <body>
    <h1>Delete an entry</h1>
		<div class="container" style="max-width:640px;">
      <div class="panel panel-primary">
        <div class="panel-body">
			    <form method="POST" action="delete_instrument.php">
			      <select name="instruments">
			        <?php
			          include('dbconn.php');

			          #retrieve records from instruments table to be used in drop-down list
			          $sql = "SELECT instrumentID, instrumentName FROM instruments;";
			          $rs = mysqli_query($con, $sql);

			          #display each of the instrument names in the database as an option
			          #use the instrumentID in the later delete script
			          while($row=mysqli_fetch_array($rs))
			          {
			            echo "<option value=" . $row['instrumentID'] .">" . $row['instrumentName'] . "</option>";
			          }
			        ?>
			      </select>
						<br>
						<input type="submit" class="btn btn-success">
						<a href='viewinstruments.php' class='btn btn-danger'>Back to instruments</a>
					</p>
			    </form>
				</div>
      </div>
    </div>
  </body>
</html>
