<?php

include('db.php');

if (isset($_POST['save'])) {
  $nombre= $_POST['nombre'];
  $Edad = $_POST['Edad'];  
  $Enfermedad = $_POST['Enfermedad'];
  $query = "SELECT ExplicacionE FROM enfermedades where nombreE = '$Enfermedad'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $explicacionE = $row[0];
  $query2 = "INSERT INTO paciente(nombre, Edad, Enfermedad, ExplicacionE) VALUES ('$nombre',  '$Edad', '$Enfermedad', '$explicacionE')";
  $result2 = mysqli_query($conn, $query2);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se ha guardado el Paciente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>