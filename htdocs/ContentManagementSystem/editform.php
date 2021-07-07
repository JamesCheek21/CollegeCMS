<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
</head>
  <body>
    <?php
      include('dbconn.php');

      #GET the instrumentID from the URl (passed via editmenu.php)
      $id = $_GET['id'];

      #if no id value, this has been accessed illegally
      if ($id != null || $id != 0)
      {
        try
        {
          #fetch corresponding row (there should only be one as the WHERE clause is the id)
          $sql = "SELECT * FROM instruments WHERE instrumentID=" . $id . ";";
          $rs = mysqli_query($con, $sql);
          $row = mysqli_fetch_row($rs);

          #store this information in variables#please note, numbers in brackets are array elements (can't use name association)
          $id = $row[0];
          $instrumentBrand = $row[1];
          $instrumentName = $row[2];
          $category = $row[3];
          $desc = $row[4];
          $imgpath = $row[5];
        }
        catch (Exception $e)
        {
          echo "Caught Exception : " . $e->getMessage();
        }
      }
    ?>
    <!--<form enctype="multipart/form-data" name="add" method="POST" action="edit_instrument.php">
      <input type="hidden" value="<?php echo $id; ?>" name="id" />
      <div>
        <label for "instrumentName">Instrument Name:</label>
        <input name="instrumentName" type="text" value="<?php echo $instrumentName;?>"/>
      </div>
      <div>
        <label for "instrumentCategory">Instrument Category:</label>
        <input name="instrumentCategory" type="text" value="<?php echo $category;?>"/>
      </div>
      <div>
        <label for "description">Instrument Description:</label>
        <input name="description" type="text" value="<?php echo $desc;?>"/>
      </div>
      <input type="submit" value="submit" />
    </form>
	<a href ='cpanel.php' class='btn btn-primary btn-block' style="font-size: 18">Click here to return to control panel</a>-->

  <div class="container" style="max-width:640px;">
    <div class="panel panel-primary">
      <div class="panel-body">
        <form enctype="multipart/form-data" name="add" method="POST" action="edit_instrument.php">
        <fieldset>
          <legend>Edit Instrument</legend>
          <input type="hidden" value="<?php echo $id; ?>" name="id">
          <div class="form-group">
            <label for="inputBrand" class="col-lg-2 control-label">Brand</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="inputBrand" placeholder="Brand" name="instrumentBrand" value="<?php echo $instrumentBrand;?>"/>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label for="inputName" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="inputName" placeholder="Name" name=instrumentName value="<?php echo $instrumentName;?>">
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Category</label>
            <div class="col-lg-10">
              <select class="form-control" id="select" name=instrumentCategory value="<?php echo $category;?>">
                <option>Electric Guitar</option>
                <option>Acoustic Guitar</option>
                <option>Drum</option>
                <option>Bass</option>
                <option>Keyboard</option>
              </select>
              <p></p>
            </div>
          </div>
          <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" id="textArea" name="description"><?php echo $desc;?></textarea>
              <p></p>
            </div>
          </div>
          <div class="form-group">
              <p></p>
              <input type="submit" class="btn btn-success">
              <a href='viewinstruments.php' class='btn btn-danger'>Back to instruments</a>
              <p></p>

            </div>
          </div>
        </fieldset>
      </form>
      </div>
    </div>
  </div>
  </body>
</html>
