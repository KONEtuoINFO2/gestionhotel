<?php
$pdo = new PDO("mysql:host=localhost;dbname=dbhrkf", "root", "");

// Requête avec jointure
$sql = "
    SELECT u.id, u.email, r.nom AS role
    FROM utilisateurs u
    JOIN roles r ON u.role_id = r.id
    ORDER BY u.id ASC
";
$utilisateurs = $pdo->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des utilisateurs</title>
  <style>
    body { font-family: Arial; background: #f9f9f9; padding: 20px; }
    table { border-collapse: collapse; width: 100%; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background-color: #007BFF; color: white; }
  </style>
</head>
<body>
  <h2>👥 Liste des utilisateurs</h2>
<table>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Rôle</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($utilisateurs as $user): ?>
    <tr>
      <td><?= $user['id'] ?></td>
      <td><?= htmlspecialchars($user['email']) ?></td>
      <td><?= ucfirst($user['role']) ?></td>
      <td>
        <a href="formulaire_utilisateur.php">➕ Ajouter un nouvel utilisateur</a> |
        <a href="modifier_utilisateur.php?id=<?= $user['id'] ?>" style="color: green;">✏️ Modifier</a> |
        <a href="supprimer_utilisateur.php?id=<?= $user['id'] ?>" style="color: red;" onclick="return confirm('Supprimer cet utilisateur ?');">🗑️ Supprimer</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
