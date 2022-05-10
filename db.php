<?php

session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'crud_mascotas'
) or die(mysqli_error($mysqli));

?>