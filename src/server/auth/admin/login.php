<?php
 include("../../database/db_admin.php");

 try {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = $_POST['id'];
   $pin = $_POST['pin'];
   $nombre = $_POST['nombre'];
   $password = $_POST['password'];
   $telefono = $_POST['telefono'];
   $mail = $_POST['mail'];

   $stmt = $conn->prepare("SELECT * FROM admin WHERE ID = :id AND PIN = :pin AND Nombre = :nombre AND Telefono = :telefono AND Mail = :mail");

   $stmt->bindParam(':id', $id);
   $stmt->bindParam(':pin', $pin);
   $stmt->bindParam(':nombre', $nombre);
   $stmt->bindParam(':telefono', $telefono);
   $stmt->bindParam(':mail', $mail);

   $stmt->execute();

   if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['Password'])) {
     $_SESSION['user_id'] = $user['ID'];
     header('Location: ../../private/table.php');
     exit();
    } else {
     echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
    }
   } else {
    header('Location: ../../../../admin/login.html');
   }
  }
 } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
 }
?>