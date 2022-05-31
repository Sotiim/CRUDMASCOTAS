<?php include("db.php") ?>

<?php $page='Enfermedad'; include("includes/header.php") ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      
    <!-- MESSAGES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>


      <div class="card card-body">
        <form action="enfermedades/save.php" method="POST">
          <div class="form-group">
              
          <input type="text" name="nombreE"  class="form-control" placeholder="Nombre" required></input>
          </div>
          <div class="form-group">
            <input type="text" name="ExplicacionE"  class="form-control" placeholder="Enfermedades" required></input>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Añadir Enfermedad">          </form>
        <br>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Identificador</th>
            <th>Enfermedades</th>
            <th>Explicación de la Enfermedad</th>
            <th>Actualizar</th>
            <th>Eliminar</th>

          </tr>
        </thead>
        <tbody>
    
        <?php
          $query = "SELECT * FROM enfermedades";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombreE']; ?></td>
            <td><?php echo $row['ExplicacionE']; ?></td>

            <td>
              <a href="enfermedades/edit.php?id=<?php echo $row['id']?>" class="btn btn-warning">
                <i class="fas fa-marker"></i>
              </a>
            </td>
            <td>
              <a href="enfermedades/delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="fas fa-eraser"></i>
              </a>
            </td>
          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</main>







<?php include('includes/footer.php'); ?>



