<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mdp = htmlspecialchars(trim($_POST['password'] ?? ''));
    
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email =:email");
    $stmt->execute([':email'=>$email]);
    $user = $stmt->fetch();
    if ($user) {
        echo "Client ou admin !";
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE email =:email");
        $stmt->execute([':email'=>$email]);
        $userclient = $stmt->fetch();
        if($userclient){
         echo " vous etres un Client !";
         
                $stmt = $pdo->prepare("SELECT * FROM logins WHERE mot_de_passe_hash =:mot_de_passe_hash");
                $stmt->execute([':mot_de_passe_hash'=>$mdp]);
                $usermdp = $stmt->fetch();
                if($usermdp && password_hash($mdp, $usermdp['mot_de_passe_hash'])){
                    echo "connexion reussie!";
                }else{
                    echo'mot de passe incorrect';
                    echo $mdp;
                }
        }else{
             echo "vous etres un utilisateur de hrkf !";
        }
       
    } else {
        echo "Nom d'utilisateur incorrect.";
    }

    /*if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'nom' => $user['nom_complet'],
            'role' => $user['role']
        ];
        echo "Connexion réussie !";
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }*/
}
?>
