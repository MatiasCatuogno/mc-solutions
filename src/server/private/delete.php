<?php
 include ("../database/db_form.php");

 if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "DELETE FROM form WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':id', $id);

  if ($stmt->execute()) {
   $_SESSION['message'] = 'Task Removed Successfully';
   $_SESSION['message_type'] = 'danger';

   header("Location: table.php");
   exit();
  } else {
   die("Query Failed");
  }
 }
?>