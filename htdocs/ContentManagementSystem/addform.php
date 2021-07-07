<html>
  <head>
    <title>POST Form</title>
		<link rel="stylesheet" href="stylesheet.css">

  </head>
  <body>
    <div class="container" style="max-width:640px;">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form name="Add Instruments" method="POST" action="add_instruments.php">
          <fieldset>
            <legend>Add Instrument</legend>
            <div class="form-group">
              <label for="inputBrand" class="col-lg-2 control-label">Brand</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputBrand" placeholder="Brand" name="instrumentBrand">
<p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-lg-2 control-label">Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name=instrumentName>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <label for="select" class="col-lg-2 control-label">Category</label>
              <div class="col-lg-10">
                <select class="form-control" id="select" name=instrumentCategory>
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
                <textarea class="form-control" rows="3" id="textArea" name="description"></textarea>
                <span class="help-block">Description of instrument.</span>
                <p></p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <input type="file" class="btn btn-default" name="image">
                <p></p>
                <input type="submit" class="btn btn-success">
                <a href='viewinstruments.php' class='btn btn-danger'>Back to Instruments</a>
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
