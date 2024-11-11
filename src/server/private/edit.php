<?php
 include ("../database/db_form.php");

 if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM form WHERE id = :id";

  $stmt = $conn->prepare($query);
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  if ($stmt->rowCount() == 1) {
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
   $nombre = $row['Nombre'];
   $apellido = $row['Apellido'];
   $correo = $row['Correo'];
   $telefono = $row['Telefono'];
   $mensaje = $row['Mensaje'];
  }
 }

 if (isset($_POST['update'])) {
  $id = $_GET['id'];

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $mensaje = $_POST['mensaje'];

  $query = "UPDATE form SET Nombre = :nombre, Apellido = :apellido, Correo = :correo, Telefono = :telefono, Mensaje = :mensaje WHERE id = :id";

  $stmt = $conn->prepare($query);

  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nombre', $nombre);
  $stmt->bindParam(':apellido', $apellido);
  $stmt->bindParam(':correo', $correo);
  $stmt->bindParam(':telefono', $telefono);
  $stmt->bindParam(':mensaje', $mensaje);

  $stmt->execute();

  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';

  header("Location: table.php");
  exit();
 }
?>

<?php include ("../php/header.php"); ?>

<div class="d-flex justify-content-center align-items-center vh-100">
 <div class="text-white">
 <h1 class="text-center">Edit</h1>
  <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" class="form-container table-container table-container-login-register">
   <div class="form-group">
    <input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre" class="form-control">
   </div>
   <div class="form-group">
    <input type="text" name="apellido" value="<?php echo $apellido; ?>" placeholder="Apellido" class="form-control">
   </div>
   <div class="form-group">
    <input type="text" name="correo" value="<?php echo $correo; ?>" placeholder="Correo" class="form-control">
   </div>
   <div class="form-group">
    <input type="text" name="telefono" value="<?php echo $telefono; ?>" placeholder="Telefono" class="form-control">
   </div>
   <div class="form-group">
    <textarea type="text" name="mensaje" rows="4" placeholder="Mensaje" class="form-control"><?php echo $mensaje; ?></textarea>
   </div>
   <div class="form-group d-flex mb-0 justify-content-center">
    <button class="btn btn-success fw-bold" name="update">
     Update
    </button>
   </div>
  </form>
 </div>
</div>

<?php include ("../php/footer.php"); ?>