<?php
// Connexion à la base de données
try {
  $pdo = new PDO('mysql:host=localhost;dbname=nom_de_ta_base;charset=utf8', 'utilisateur', 'mot_de_passe');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die('Erreur de connexion : ' . $e->getMessage());
}

// Récupération et sécurisation des données
$nom = htmlspecialchars($_POST['nom']);
$email = htmlspecialchars($_POST['email']);
$date_arrivee = $_POST['date_arrivee'];
$date_depart = $_POST['date_depart'];
$type_chambre = htmlspecialchars($_POST['type_chambre']);
$message = htmlspecialchars($_POST['message']);

// Insertion en base de données
$sql = "INSERT INTO reservations (nom, email, date_arrivee, date_depart, type_chambre, message) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $email, $date_arrivee, $date_depart, $type_chambre, $message]);

// Envoi des e-mails

// 1. À l’utilisateur
$subject_user = "Confirmation de votre réservation";
$message_user = "Bonjour $nom,\n\nMerci pour votre réservation du $date_arrivee au $date_depart.\nType de chambre : $type_chambre.\n\nNous vous contacterons très bientôt.\n\nCordialement,\nL'équipe HRK";

mail($email, $subject_user, $message_user);

// 2. À l’admin
$admin_email = "admin@tonsite.com";
$subject_admin = "Nouvelle réservation reçue";
$message_admin = "Une nouvelle réservation a été effectuée :\n\nNom : $nom\nEmail : $email\nArrivée : $date_arrivee\nDépart : $date_depart\nType : $type_chambre\nMessage : $message";

mail($admin_email, $subject_admin, $message_admin);

// Redirection vers la page de confirmation
header("Location: page_confirmation.html");
exit("../index.html");
?>
