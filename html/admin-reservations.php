<?php
session_start();
if (!isset($_SESSION["admin_connecté"])) {
  header("Location: admin-login.php");
  exit();
}
?>

<?php

// Connexion à la base
try {
  $pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'mot_de_passe');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

// Récupération des réservations
$sql = "SELECT * FROM reservations ORDER BY date_envoi DESC";
$reservations = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tableau de Réservations</title>
  <style>
    body {
      font-family: Segoe UI, sans-serif;
      background-color: #f2f2f2;
      padding: 40px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: orangered;
      color: white;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<h1>Liste des Réservations</h1>

<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Email</th>
      <th>Arrivée</th>
      <th>Départ</th>
      <th>Chambre</th>
      <th>Message</th>
      <th>Soumis le</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservations as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['nom']) ?></td>
        <td><?= htmlspecialchars($r['email']) ?></td>
        <td><?= $r['date_arrivee'] ?></td>
        <td><?= $r['date_depart'] ?></td>
        <td><?= htmlspecialchars($r['type_chambre']) ?></td>
        <td><?= nl2br(htmlspecialchars($r['message'])) ?></td>
        <td><?= $r['date_envoi'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>
