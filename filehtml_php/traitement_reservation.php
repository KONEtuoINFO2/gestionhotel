<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 🔐 Sécurisation des entrées
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $date_arrivee = $_POST['date_arrivee'] ?? '';
    $date_depart = $_POST['date_depart'] ?? '';
    $date_reservation = $_POST['date_reservation'] ?? '';
    $type_chambre = htmlspecialchars($_POST['type_chambre'] ?? '');
    $nombre_personnes = intval($_POST['nombre_personnes'] ?? 0);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    $aujourdhui = date('Y-m-d');
    $erreurs = [];

    // 🧪 Validation des champs
    if ($date_reservation !== $aujourdhui) $erreurs[] = "Date de réservation invalide.";
    if ($date_arrivee < $aujourdhui) $erreurs[] = "Date d’arrivée est dans le passé.";
    if ($date_depart <= $date_arrivee) $erreurs[] = "La date de départ doit être après la date d’arrivée.";
    if (!in_array($type_chambre, ['simple','double','suite','table','salle','piscine','restaurant','espace-vert']))
        $erreurs[] = "Type de chambre non valide.";
    if ($nombre_personnes < 1) $erreurs[] = "Nombre de personnes incorrect.";

    // ❌ Affichage des erreurs si besoin
    if (!empty($erreurs)) {
        foreach ($erreurs as $e) {
            // ✅ Message de confirmation avec redirection
    echo "<div style='
        background-color: #e0f7fa;
        color: red;
        padding: 25px;
        margin: 60px auto;
        width: 60%;
        text-align: center;
        font-size: 18px;
        font-family: sans-serif;
        border-radius: 10px;
        border: 2px solid #00695c;
    '>
        ✅  <strong>Désolé !nous ne pouvons pas  prendre votre réservation car " . htmlspecialchars($e) . " </strong> !<br><br>
        Vous serez redirigé vers la page d’accueil dans quelques secondes…
    </div>";

    // ⏱️ Redirection automatique en JavaScript
    echo '<script>
        setTimeout(() => {
            window.location.href = "../index.html";
        }, 10000);
    </script>';
        }
        exit;
    }

    // 🗃️ Insertion en base de données
    try {
        $sql = "INSERT INTO reservations 
                (id_client, id_type_reservation, date_reservation,date_arrivee, date_depart,nombres_places,message,statut)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $id_client, $id_type_resev,$date_reservation, $date_arrivee, $date_depart, $nombre_places, $message,$statut
        ]);
    } catch (PDOException $e) {
        error_log("Erreur PDO : " . $e->getMessage());
        echo "<p style='color: red;'>Une erreur est survenue lors de l’enregistrement.</p>";
        exit;
    }

    // ✅ Message de confirmation avec redirection
    echo "<div style='
        background-color: #e0f7fa;
        color: #00695c;
        padding: 25px;
        margin: 60px auto;
        width: 60%;
        text-align: center;
        font-size: 18px;
        font-family: sans-serif;
        border-radius: 10px;
        border: 2px solid #00695c;
    '>
        ✅ Réservation enregistrée avec succès pour <strong>" . htmlspecialchars($nom) . "</strong> !<br><br>
        Vous serez redirigé vers la page d’accueil dans quelques secondes…
    </div>";

    // ⏱️ Redirection automatique en JavaScript
    echo '<script>
        setTimeout(() => {
            window.location.href = "../index.html";
        }, 4000);
    </script>';
}
?>