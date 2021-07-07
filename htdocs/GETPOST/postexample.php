<?php
  if ($_POST['fname'] != null && $_POST['course']!= null)
  {
    $fname = $_POST['fname'];
    $course = $_POST['course'];

    echo "Hello " . $fname . ", welcome to the super secret area for people on the " . $course . " course.";
  }
  else
  {
    echo "ERROR: Not all data given. Please provide a Name and a Course.";
  }
?>
