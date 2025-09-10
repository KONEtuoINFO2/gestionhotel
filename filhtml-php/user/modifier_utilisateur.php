<?php
$pdo = new PDO("mysql:host=localhost;dbname=dbhrkf", "root", "");

// Récupérer l'utilisateur à modifier
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID manquant.";
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

    $stmt = $pdo->prepare("UPDATE utilisateurs SET email = ?, role_id = ? WHERE id = ?");
    $stmt->execute([$email, $role_id, $id]);

    header("Location: liste_utilisateurs.php");
    exit;
}

// Récupérer les infos de l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

// Récupérer tous les rôles
$roles = $pdo->query("SELECT * FROM roles")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier utilisateur</title>
</head>
<body>
  <h2>✏️ Modifier l'utilisateur</h2>
  <form method="post">
    <label>Email :</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

    <label>Rôle :</label><br>
    <select name="role_id">
      <?php foreach ($roles as $role): ?>
        <option value="<?= $role['id'] ?>" <?= $role['id'] == $user['role_id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($role['nom']) ?>
        </option>
      <?php endforeach; ?>
    </select><br><br>

    <button type="submit">✅ Enregistrer</button>
    <a href="liste_utilisateurs.php">↩️ Annuler</a>
  </form>
</body>
</html>
