<?php
 include("../../database/db_admin.php");

 if (isset($_POST['id']) && isset($_POST['pin']) && isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['telefono']) && isset($_POST['mail'])) {

  $id = $_POST['id'];
  $pin = $_POST['pin'];
  $nombre = $_POST['nombre'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $telefono = $_POST['telefono'];
  $mail = $_POST['mail'];

  try {
   $query = "INSERT INTO admin (ID, PIN, Nombre, Password, Telefono, Mail) VALUES (:id, :pin, :nombre, :password, :telefono, :mail)";

   $stmt = $conn->prepare($query);

   $stmt->bindParam(':id', $id);
   $stmt->bindParam(':pin', $pin);
   $stmt->bindParam(':nombre', $nombre);
   $stmt->bindParam(':password', $password);
   $stmt->bindParam(':telefono', $telefono);
   $stmt->bindParam(':mail', $mail);
 
   $stmt->execute();
 
   header("Location: ../../../../admin/login.html");
   exit();
  } catch (PDOException $e) {
   echo "Error al registrar el usuario: " . $e->getMessage();
  }
 }
?>
