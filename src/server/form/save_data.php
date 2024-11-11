<?php
 include("../database/db_form.php");

 if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['mensaje'])) {

 $nombre = $_POST['nombre'];
 $apellido = $_POST['apellido'];
 $correo = $_POST['correo'];
 $telefono = $_POST['telefono'];
 $mensaje =  $_POST['mensaje'];

 try {
  $query = "INSERT INTO form (Nombre, Apellido, Correo, Telefono, Mensaje) VALUES (:nombre, :apellido, :correo, :telefono, :mensaje)";
  $stmt = $conn->prepare($query);

  $stmt->bindParam(':nombre', $nombre);
  $stmt->bindParam(':apellido', $apellido);
  $stmt->bindParam(':correo', $correo);
  $stmt->bindParam(':telefono', $telefono);
  $stmt->bindParam(':mensaje', $mensaje);

  if ($stmt->execute()) {
   echo "Formulario enviado correctamente";
  } else {
   echo "Error al enviar el formulario.";
  }
 } catch (PDOException $e) {
   echo "Error: " . $e->getMessage();
  }
 } else {
  echo "Por favor, complete todos los campos del formulario.";
 }
?>