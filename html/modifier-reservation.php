<?php
session_start();
if (!isset($_SESSION["admin_connecté"])) {
  header("Location: admin-login.php");
  exit();
}

try {
  $pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'mot_de_passe');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

if (!isset($_GET['id'])) {
  die("ID manquant !");
}

// Récupérer la réservation à modifier
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = ?");
$stmt->execute([$id]);
$reservation = $stmt->fetch();

if (!$reservation) {
  die("Réservation introuvable.");
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nom = htmlspecialchars($_POST['nom']);
  $email = htmlspecialchars($_POST['email']);
  $date_arrivee = $_POST['date_arrivee'];
  $date_depart = $_POST['date_depart'];
  $type_chambre = htmlspecialchars($_POST['type_chambre']);
  $message = htmlspecialchars($_POST['message']);

  $sql = "UPDATE reservations SET nom=?, email=?, date_arrivee=?, date_depart=?, type_chambre=?, message=? WHERE id=?";
  $update = $pdo->prepare($sql);
  $update->execute([$nom, $email, $date_arrivee, $date_depart, $type_chambre, $message, $id]);

  header("Location: admin-reservations.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier Réservation</title>
  <style>
    body {
      font-family: Segoe UI, sans-serif;
      background-color: #f2f2f2;
      padding: 40px;
    }

    form {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      max-width: 500px;
      margin: 0 auto;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    input, select, textarea {
      display: block;
      width: 100%;
      margin-bottom: 15px;
      padding: 10px;
      font-size: 1em;
    }

    button {
      background: orangered;
      color: white;
      border: none;
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 5px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <form method="POST">
    <h2>Modifier la réservation</h2>
    <input type="text" name="nom" value="<?= htmlspecialchars($reservation['nom']) ?>" required />
    <input type="email" name="email" value="<?= htmlspecialchars($reservation['email']) ?>" required />
    <input type="date" name="date_arrivee" value="<?= $reservation['date_arrivee'] ?>" required />
    <input type="date" name="date_depart" value="<?= $reservation['date_depart'] ?>" required />
    <select name="type_chambre" required>
      <option <?= $reservation['type_chambre'] === 'simple' ? 'selected' : '' ?> value="simple">Simple</option>
      <option <?= $reservation['type_chambre'] === 'double' ? 'selected' : '' ?> value="double">Double</option>
      <option <?= $reservation['type_chambre'] === 'suite' ? 'selected' : '' ?> value="suite">Suite</option>
    </select>
    <textarea name="message" rows="4"><?= htmlspecialchars($reservation['message']) ?></textarea>
    <button type="submit">Enregistrer les modifications</button>
  </form>

</body>
</html>
