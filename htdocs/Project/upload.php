<?php
  //Where the file is going to be placed
  $target_path = "uploads/";

  //if you have troubles with script, uncomment the below line of code.
  //echo "<p>" . var_dump($_FILES) . "</p>"

  if((($_FILES["uploaded_file"]["type"] == "image/gif")
  || ($_FILES["uploaded_file"]["type"] == "image/jpeg")
  || ($_FILES["uploaded_file"]["type"] == "image/jpg")
  || ($_FILES["uploaded_file"]["type"] == "image/pjeg")
  || ($_FILES["uploaded_file"]["type"] == "image/x-png")
  || ($_FILES["uploaded_file"]["type"] == "image/png"))
  && ($_FILES["uploaded_file"]["size"] < 2097152))
  {
    if ($_FILES["uploaded_file"]["error"] > 0)
    {
      echo "Return code: " . $_FILES["uploaded_file"]["error"] . "<br>";
    }
    else
    {
      echo "Upload: " . $_FILES["uploaded_file"]["name"] . "<br>";
      echo "Type: " . $_FILES["uploaded_file"]["type"] . "<br>";
      echo "Size: " . $_FILES["uploaded_file"]["size"] . "<br>";
      echo "Temp file: " . $_FILES["uploaded_file"]["tmp_name"] . "<br>";

      if (file_exists($target_path . $_FILES["uploaded_file"]["name"]))
      {
        echo $_FILES["uploaded_file"]["name"] . " already exists.";
        header('location:uploadform.php?msg=exists');
      }
      else
      {
        move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_path . $_FILES["uploaded_file"]["name"]);
        echo "File Uploaded!";
        header("location: gallery.php");
      }
    }
  }
  else
  {
    header('location:uploadform.php?msg=failed');
  }
?>
