<?php
session_start();
if (!isset($_SESSION["admin_connecté"])) {
  header("Location: admin-login.php");
  exit();
}

if (!isset($_GET['id'])) {
  die("ID manquant !");
}

$id = $_GET['id'];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'mot_de_passe');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ?");
  $stmt->execute([$id]);

  header("Location: admin-reservations.php");
  exit();
} catch (Exception $e) {
  die("Erreur : " . $e->getMessage());
}
?>
