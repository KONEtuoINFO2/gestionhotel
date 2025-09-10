<?php

session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "hotel_db");
$result = $conn->query("SELECT id, email, role FROM utilisateurs");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Interface Admin</title>
</head>
<body>
  <h1>👨‍💼 Interface Administrateur</h1>
  <a href="ajouter_utilisateur.php">➕ Ajouter un utilisateur</a>
  <a href="logout.php">🚪 Déconnexion</a>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Rôle</th>
      <th>Actions</th>
    </tr>
    <?php while ($user = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= htmlspecialchars($user['email']) ?></td>
        <td><?= $user['role'] ?></td>
        <td>
          <!-- Actions pour chaque utilisateur -->
          <a href="formulaire_utilisateur.php">➕ Ajouter </a>
          <a href="liste_utilisateurs.php?id=<?= $user['id'] ?>">👁️ Voir les utilisateurs</a>
          <a href="modifier_utilisateur.php?id=<?= $user['id'] ?>">✏️ Modifier</a>
          <a href="supprimer_utilisateur.php?id=<?= $user['id'] ?>" onclick="return confirm('Supprimer cet utilisateur ?')">🗑️ Supprimer</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
