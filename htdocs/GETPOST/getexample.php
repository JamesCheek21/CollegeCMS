<?php
  if ($_GET['fname'] != null && $_GET['course']!= null)
  {
    $fname = $_GET['fname'];
    $course = $_GET['course'];

    echo "Hello " . $fname . ", welcome to the super secret area for people on the " . $course . " course.";
  }
  else {
    echo "ERROR: Not all data given. Please provide a Name and a Course.";
  }
?>
