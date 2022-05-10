<?php
include("db.php");
$nombre = '';
$Tipo= '';
$Edad= '';
$Enfermedades= '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM mascotas WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $Tipo = $row['Tipo'];
    $Edad = $row['Edad'];
    $Enfermedades = $row['Enfermedades'];

  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $Tipo = $_POST['Tipo'];
  $Edad = $_POST['Edad'];
  $Enfermedades = $_POST['Enfermedades'];
  
  $date=date_create("",timezone_open("America/Mexico_city"));
  $updated_at = date_format($date,"Y-m-d H:i:s");

  $query = "UPDATE mascotas set nombre = '$nombre', Tipo = '$Tipo', Edad = '$Edad', Enfermedades = '$Enfermedades', updated_at = '$updated_at'  WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se ha actualizado la Mascota correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
            <input type="text" name="nombre"  class="form-control" value="<?php echo $nombre; ?>"></input>
          </div>
          <div class="form-group">
          <div>Selecciona Tipo de Mascota : <select name="Tipo" class="form-control"  >
				<option value="0" disabled>Este es tu antiguo tipo: <?php echo $Tipo; ?></option>
        <option value="Mamíferos">Mamíferos</option>
        <option value="Aves">Aves</option>
        <option value="Reptiles">Reptiles</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="Edad"  class="form-control" value="<?php echo $Edad; ?>"></input>
          </div>
          <div class="form-group">
            <input type="text" name="Enfermedades"  class="form-control" value="<?php echo $Enfermedades; ?>"></input>
          </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>