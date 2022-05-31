<?php
include("../db.php");
$nombreE = '';
$ExplicacionE	= '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM enfermedades WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombreE = $row['nombreE'];
    $ExplicacionE	 = $row['ExplicacionE'];

  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombreE= $_POST['nombreE'];
  $ExplicacionE	 = $_POST['ExplicacionE'];
  

  $query = "UPDATE enfermedades set nombreE = '$nombreE', ExplicacionE = '$ExplicacionE' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Se ha actualizado la Enfermedad correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../enfermedades.php');
}

?>
<?php $page='Enfermedades'; include('../includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
          <div class="form-group">
            <input type="text" name="nombreE"  class="form-control" value="<?php echo $nombreE; ?>" required></input>
          </div>
          <div class="form-group">
            <input type="text" name="ExplicacionE"  class="form-control" value="<?php echo $ExplicacionE; ?>" required></input>
          </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>