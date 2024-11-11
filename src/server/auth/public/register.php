<?php
 include("../../database/db_users.php");

 if (isset($_POST['usuario']) && isset($_POST['password'])) {

  $usuario = $_POST['usuario'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  try {
   $query = "INSERT INTO users (Usuario, Password) VALUES (:usuario, :password)";

   $stmt = $conn->prepare($query);

   $stmt->bindParam(':usuario', $usuario);
   $stmt->bindParam(':password', $password);
 
   $stmt->execute();
 
   header('Location: ../../../../public/login.html');
   exit();
  } catch (PDOException $e) {
   echo "Error al registrar el usuario: " . $e->getMessage();
  }
 }
?>