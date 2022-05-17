<?php
include("connectdb.php");
session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// print_r($stmt);
if ($result->num_rows >0) {
   $user = $result->fetch_assoc();
   if (password_verify($password, $user["password"])) {
      $_SESSION["id"] = $user["id"];
      $_SESSION["name"] = $user["name"];
      $_SESSION["email"] = $user["email"];
      $_SESSION["tel"] = $user["phoneNumber"];
      header("Location:index.php");
   } else {
      $_SESSION['message'] = 'La combinación usuario/contraseña no coincide';
      $_SESSION['message_type'] = 'warning';
      header('Location: login.php');
   }
} else {
   $_SESSION['message'] = 'La combinación usuario/contraseña no coincide !';
   $_SESSION['message_type'] = 'warning';
   header('Location: login.php');
}
