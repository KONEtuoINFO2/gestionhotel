<?php
$pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'mot_de_passe');

// Infos du nouvel admin
$username = "admin1";
$password = "supersecret123";

// Hachage du mot de passe
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insertion
$sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $hash]);

echo "✅ Admin ajouté avec succès";
?>
