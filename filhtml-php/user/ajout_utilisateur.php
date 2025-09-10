<?php
$pdo = new PDO("mysql:host=localhost;dbname=dbhrkf", "root", "");

$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
$role_id = intval($_POST['role_id']);

// Vérifie que le rôle existe
$stmt = $pdo->prepare("SELECT COUNT(*) FROM roles WHERE id = ?");
$stmt->execute([$role_id]);
if ($stmt->fetchColumn() == 0) {
    die("Rôle invalide.");
}

// Insertion
$sql = "INSERT INTO utilisateurs (email, mot_de_passe, role_id) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $mot_de_passe, $role_id]);

echo "Utilisateur ajouté avec succès !";
?>
<?php
$pdo = new PDO("mysql:host=localhost;dbname=dbhrkf", "root", "");

$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
$role_id = intval($_POST['role_id']);

// Vérifie que le rôle existe
$stmt = $pdo->prepare("SELECT COUNT(*) FROM roles WHERE id = ?");
$stmt->execute([$role_id]);
if ($stmt->fetchColumn() == 0) {
    die("Rôle invalide.");
}

// Insertion
$sql = "INSERT INTO utilisateurs (email, mot_de_passe, role_id) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $mot_de_passe, $role_id]);

echo "Utilisateur ajouté avec succès !";
?>
