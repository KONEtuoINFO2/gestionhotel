<?php
$pdo = new PDO("mysql:host=localhost;dbname=dbhrkf", "root", "");
$roles = $pdo->query("SELECT id, nom FROM roles")->fetchAll();
?>

<form action="ajouter_utilisateur.php" method="POST">
  <label for="email">Email :</label><br>
  <input type="email" name="email" required><br><br>

  <label for="mot_de_passe">Mot de passe :</label><br>
  <input type="password" name="mot_de_passe" required><br><br>

  <label for="role_id">Rôle :</label><br>
  <select name="role_id" required>
    <?php foreach ($roles as $role): ?>
      <option value="<?= $role['id'] ?>"><?= ucfirst($role['nom']) ?></option>
    <?php endforeach; ?>
  </select><br><br>

  <input type="submit" value="Ajouter l'utilisateur">
</form>
