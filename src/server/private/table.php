<?php
 include ("../database/db_form.php");

 if (!isset($_SESSION['user_id'])) {
  header('Location: ../../../admin/login.html');
  exit();
 }

 try {
  $stmt = $conn->prepare("SELECT * FROM form");
  $stmt->execute();
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
 } catch (PDOException $e) {
  echo "Error al obtener los datos: " . $e->getMessage();
  exit();
 }
?>

<?php include ("../php/header.php"); ?>
 <div class="py-5">
  <div class="form-group go-back">
   <a type="button" href="../../../" class="btn btn-primary fw-bold">Back</a>
  </div>
  <div class="form-group log-out">
   <a type="button" href="../auth/logout.php" class="btn btn-primary fw-bold">Log Out</a>
  </div>
  <div class="row">
   <div class="col-md-4">
    <?php if (isset($_SESSION['message'])) { ?>
     <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['message']; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
      </button>
     </div>
     <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
    <?php } ?>
   </div>
  </div>
  <div class="table-container mt-4">
   <table class="table table-bordered bg-white p-4">
    <thead>
     <tr>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">ID</th>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">Nombre</th>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">Apellido</th>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">Correo</th>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">Teléfono</th>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">Mensaje</th>
      <th scope="col" class="align-middle text-center fs-5 fw-bold bg-warning">Edición</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach ($resultados as $row) { ?>
     <tr>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle"><?= $row['ID']; ?></td>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle"><?= $row['Nombre']; ?></td>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle"><?= $row['Apellido']; ?></td>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle"><?= $row['Correo']; ?></td>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle"><?= $row['Telefono']; ?></td>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle"><?= $row['Mensaje']; ?></td>
      <td scope="row" class="align-middle text-center fs-5 fw-bold bg-warning-subtle">
       <a href="edit.php?id=<?= $row['ID']; ?>" class="btn btn-primary"><i class="fas fa-marker"></i></a>
       <a href="delete.php?id=<?= $row['ID']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
      </td>
     </tr>
    <?php } ?>
    </tbody>
   </table>
  </div>
 </div>
<?php include ("../php/footer.php"); ?>