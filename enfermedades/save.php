<?php

include('../db.php');

if (isset($_POST['save'])) {
  $nombreE= $_POST['nombreE'];
  $ExplicacionE = $_POST['ExplicacionE'];
  $query = "INSERT INTO enfermedades(nombreE, ExplicacionE) VALUES ('$nombreE',  '$ExplicacionE')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se ha guardado la enfermedad';
  $_SESSION['message_type'] = 'success';
  header('Location: ../enfermedades.php');

}

?>