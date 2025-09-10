<?php
require_once '../config/database.php';

// 🛡️ Fonctions de validation personnalisées
function estNumeroIvoirien($num) {
    return preg_match('/^(01|05|07|25|27)\d{8}$/', $num);
}

function estMotDePasseValide($mdp) {
    return preg_match('/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/', $mdp);
}

function estNomCLIENTValide($nom) {
    return preg_match('/^[a-z0-9@]+$/', $nom) &&
           preg_match('/\d/', $nom) &&
           strpos($nom, '@') !== false;
}
function estEmailValide($email) {
    return preg_match('/^[a-z0-9]+[0-9]*@dem\.com$/', $email) &&
           strpos($email, '@') !== false &&
           strpos($email, '.com') !== false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 🔐 Sécurisation des entrées
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars(trim($_POST['telephone'] ?? ''));
    $mdp = $_POST['motdepasse'] ?? '';
    $mdpconf = $_POST['confirmation'] ?? '';
    $mdphache = password_hash($mdp, PASSWORD_DEFAULT);
    $date_inscrit = date('Y-m-d');
    $erreurs = [];

    // ✅ Validations
    if (strlen($nom) < 2) $erreurs[] = "👤 Nom trop court.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $erreurs[] = "📧 Adresse e-mail invalide.";
    if (!estNumeroIvoirien($contact)) $erreurs[] = "📱 Numéro ivoirien invalide (01, 05, 07, 25, 27 + 8 chiffres).";
    if (!estMotDePasseValide($mdp)) $erreurs[] = "🔐 Mot de passe invalide : 8 caractères minimum, lettre + chiffre.";
    if ($mdp !== $mdpconf) $erreurs[] = "⚠️ Les deux mots de passe ne correspondent pas.";
    if (!empty($erreurs)) {
        // ❌ Affichage des erreurs
        foreach ($erreurs as $erreur) {
            echo "<p style='color:red;'>$erreur</p>";
        }
        echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 8000);</script>';
    } else {
        try {
            // 🔍 Vérification de l'existence de compte client
            $requete = $pdo->prepare('SELECT * FROM clients WHERE email = :email AND telephone = :telephone');
            $requete->execute([
                ':email' => $email,
                ':telephone' => $contact
                
            ]);
            $utilisateur_existe = $requete->fetch();

            if (!$utilisateur_existe) {
          
                    // 📥 Insertion utilisateur
                    $stmt = $pdo->prepare("INSERT INTO clients (nom, email,telephone, date_inscription) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$nom, $email,$contact, $date_inscrit]);

                    $clientId = $pdo->lastInsertId();
                    // 🔑 Insertion login
                    $stmtLogin = $pdo->prepare("INSERT INTO logins (utilisateur_id,mot_de_passe_hash,date_inscription) VALUES (?, ?, ?)");
                    $stmtLogin->execute([$clientId,$mdphache,$date_inscrit]);

                    // 🔑 Insertion utilisateur
                    $stmtuser = $pdo->prepare("INSERT INTO utilisateurs 
                (nom, email,contacte, date_creation,role_id)
                VALUES (?, ?, ? ,? ,?)");
                    $stmtuser->execute([$nom, $email,$contact,$date_inscrit,$clientId],);
                    // 🎉 Confirmation
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
        ✅ Votre compte a été crée avec succès <strong>" . htmlspecialchars($nom) . "</strong> !<br><br>
        Vous serez redirigé vers la page d’accueil dans quelques secondes…
    </div>";

    // ⏱️ Redirection automatique en JavaScript
    echo '<script>
        setTimeout(() => {
            window.location.href = "../index.html";
        }, 4000);
    </script>';
            }else {
                // ❌ Déjà existant
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
        ⚠️ Vous avez déjà un compte utilisateur. Veuillez vous connecter.<strong>" . htmlspecialchars($nom) . "</strong> !<br><br>
        Vous serez redirigé vers la page d’accueil dans quelques secondes…
    </div>";

    // ⏱️ Redirection automatique en JavaScript
    echo '<script>
        setTimeout(() => {
            window.location.href = "../index.html";
        }, 4000);
    </script>';
            }
            } catch (PDOException $e) {
    echo "<p style='color:red;'>Erreur PDO : " . $e->getMessage() . "</p>";
    error_log("Erreur PDO : " . $e->getMessage());
    // ...
} catch (PDOException $e) {
    error_log("Erreur PDO : " . $e->getMessage());
    echo "<div style='color:red;text-align:center;'><strong>🚨 Erreur serveur. Veuillez contacter un administrateur.</strong></div>";
    echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
}
    }
} else {
    // ❌ Méthode non autorisée
    echo "<div style='color:red;text-align:center;'><strong>⛔ Méthode non autorisée.</strong></div>";
    echo '<script>setTimeout(() => { window.location.href = "../index.html"; }, 5000);</script>';
}
?>