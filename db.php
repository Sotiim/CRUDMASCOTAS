<?php

session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'hospitalsa'
) or die(mysqli_error($mysqli));

?>