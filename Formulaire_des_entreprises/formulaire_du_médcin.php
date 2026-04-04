<?php
session_start();
include "../page-include/config.php"; // Assure-toi que $connexion est bien un objet PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage minimal
    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $email = trim($_POST["email"]);
    $telephone = trim($_POST["telephone"]);
    $entreprise = trim($_POST["entreprise"]);
    $adresse = trim($_POST["adresse"]);
    $specialite = trim($_POST["specialite"]);
    $message = trim($_POST["message"]);
    $mot_de_passe = $_POST["mot_de_passe"];
    $mot_de_passe_confirme = $_POST["mot_de_passe_confirme"];

    if ($mot_de_passe === $mot_de_passe_confirme) {
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);

        try {
            $connexion->beginTransaction();

            // 1. Insérer dans users
            $stmt = $connexion->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->execute([':email' => $email, ':password' => $mot_de_passe_hash]);
            $user_id = $connexion->lastInsertId(); // Récupérer l'ID généré

            // 2. Insérer dans medcin avec user_id
            $stmt = $connexion->prepare("
                INSERT INTO medcin 
                (nom, prenom, email, telephone, entreprise, adresse, specialite, message, mot_de_passe, user_id)
                VALUES (:nom, :prenom, :email, :telephone, :entreprise, :adresse, :specialite, :message, :mot_de_passe, :user_id)
            ");

            $success = $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':telephone' => $telephone,
                ':entreprise' => $entreprise,
                ':adresse' => $adresse,
                ':specialite' => $specialite,
                ':message' => $message,
                ':mot_de_passe' => $mot_de_passe_hash,
                ':user_id' => $user_id
            ]);

            $connexion->commit();

            if ($success) {
                $_SESSION['login_error'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Inscription réussie. Vous pouvez maintenant vous connecter.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                $_SESSION['login_error'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Erreur d\'insertion. Vérifie les données et réessaie.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

            header('Location: Formulaire_de_commercial.php');
            exit;

        } catch (Exception $e) {
            $connexion->rollBack();
            $_SESSION['login_error'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Erreur : " . $e->getMessage() . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            header('Location: Formulaire_de_commercial.php');
            exit;
        }

    } else {
        $_SESSION['login_error'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Les mots de passe ne correspondent pas. Veuillez réessayer.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header('Location: Formulaire_de_commercial.php');
        exit;
    }
}
?>