<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM enfermedades WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Enfermedad Eliminada Correctamente!';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../enfermedades.php');
}

?>