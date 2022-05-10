<?php

include('db.php');

if (isset($_POST['save'])) {
  $nombre= $_POST['nombre'];
  $Tipo = $_POST['Tipo'];
  $Edad = $_POST['Edad'];
  $Enfermedades = $_POST['Enfermedades'];
  $query = "INSERT INTO mascotas(nombre, Tipo, Edad, Enfermedades) VALUES ('$nombre', '$Tipo', '$Edad', '$Enfermedades')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se ha guardado la Mascota';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>