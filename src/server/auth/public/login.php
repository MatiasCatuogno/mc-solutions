<?php
 include("../../database/db_users.php");

 try {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $usuario = $_POST['usuario'];
   $password = $_POST['password'];

   $stmt = $conn->prepare("SELECT * FROM users WHERE Usuario = :usuario");

   $stmt->bindParam(':usuario', $usuario);

   $stmt->execute();

   if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['Password'])) {
     $_SESSION['user_id'] = $user['ID'];
     header('Location: ../../../../');
     exit();
    } else {
     echo "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
    }
   } else {
    header('Location: ../../../../public/login.html');
   }
  }
 } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
 }
?>