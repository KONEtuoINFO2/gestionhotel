<?php
session_start();

// Données d’accès (à personnaliser !)
$admin_user = "admin";
$admin_pass = "motdepasse123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($username === $admin_user && $password === $admin_pass) {
    $_SESSION["admin_connecté"] = true;
    header("Location: admin-reservations.php");
    exit();
  } else {
    $erreur = "Identifiants incorrects.";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion Admin</title>
  <style>
    body {
      font-family: Segoe UI, sans-serif;
      background-color: #f7f7f7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      text-align: center;
    }
    input {
      padding: 10px;
      margin: 10px 0;
      width: 100%;
    }
    button {
      padding: 10px 20px;
      background: orangered;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
<form method="POST">
  <h2>Connexion Admin</h2>
  <?php if (isset($erreur)) echo "<p class='error'>$erreur</p>"; ?>
  <input type="text" name="username" placeholder="Nom d'utilisateur" required />
  <input type="password" name="password" placeholder="Mot de passe" required />
  <button type="submit">Se connecter</button>
</form>
</body>
</html>
<?php
session_start();

try {
  $pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'mot_de_passe');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
  $stmt->execute([$username]);
  $admin = $stmt->fetch();

  if ($admin && password_verify($password, $admin["password"])) {
    $_SESSION["admin_connecté"] = true;
    $_SESSION["admin_nom"] = $username;
    header("Location: admin-reservations.php");
    exit();
  } else {
    $erreur = "Identifiants incorrects.";
  }
}
?>
