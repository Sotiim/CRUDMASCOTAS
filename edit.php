<?php
include("db.php");
$nombre = '';
$Edad= '';
$Enfermedad= '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM paciente WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $Edad = $row['Edad'];
    $Enfermedad = $row['Enfermedad'];

  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $Edad = $_POST['Edad'];
  $Enfermedad = $_POST['Enfermedad'];
  $query = "SELECT ExplicacionE FROM enfermedades where nombreE = '$Enfermedad'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $ExplicacionE = $row[0];
  $query = "UPDATE paciente set nombre = '$nombre', ExplicacionE ='$ExplicacionE', Edad = '$Edad', Enfermedad = '$Enfermedad' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se ha actualizado el Paciente correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php $page='Paciente'; include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
            <input type="text" name="nombre"  class="form-control" value="<?php echo $nombre; ?>" required></input>
          </div>
          <div class="form-group">
          <div>Selecciona Tipo de Enfermedad : <select name="Enfermedad" class="form-control" required >
				<option value="0" disabled>Este es tu Enfermedad antigua : <?php echo $Enfermedad; ?></option>

        <?php
          $query = "SELECT * FROM enfermedades";
          $result_tasks = mysqli_query($conn, $query);    

          foreach($result_tasks as $row) { ?>

            <option value="<?php echo $row['nombreE']; ?>"><?php echo $row['nombreE']; ?></option>
            
          <?php } ?>

            </select>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="Edad"  class="form-control" value="<?php echo $Edad; ?>" required></input>
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