<?php
$pdo = new PDO("mysql:host=localhost;dbname=dbhrkf", "root", "");

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID manquant.";
    exit;
}

// Supprimer l'utilisateur
$stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
$stmt->execute([$id]);

header("Location: liste_utilisateurs.php");
exit;
