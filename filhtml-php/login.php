<?php
session_start();
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["password"];
    $mdp=password_hash($mot_de_passe,PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("
        SELECT u.id, u.email, u.password, r.nom AS roles
        FROM utilisateurs u
        JOIN roles r ON u.role_id = r.id
        WHERE u.email = ?
    ");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if (!$user) {
        if (password_verify($mdp, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["role"] = $user["role"];

            // Redirection selon le rôle
            switch ($user["role"]) {
                case "adminpcinfodev":
                    header("Location: admin_interface.php");
                    break;
                case "admin":
                    header("Location: admin_interface.php");
                    break;
                case "directeur":
                    header("Location: directeur/reservations.html");
                    break;
                case "chef_reception":
                    header("Location: chef_reception/chambres.html");
                    break;
                case "receptionniste":
                    header("Location: receptionniste/reservations_chambres.html");
                    break;
                case "maitre_hotel":
                    header("Location: maitre_hotel/reservations_salles.html");
                    break;
                default:
                    echo "Rôle inconnu.";
            }
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
        echo $mdp;
    }
}

?>