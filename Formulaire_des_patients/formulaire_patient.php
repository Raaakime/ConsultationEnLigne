<?php
session_start();
include "../page-include/config.php"; // Assure-toi que $connexion est bien un objet PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage des données
    $nom = trim($_POST["nom"]);
    $prenom = trim($_POST["prenom"]);
    $date_naissance = trim($_POST["date_naissance"]);
    $lieu_de_naissance = trim($_POST["lieu_de_naissance"]);
    $email = trim($_POST["email"]);
    $telephone = trim($_POST["telephone"]);
    $groupe_sanguin = trim($_POST["groupe_sanguin"] ?? '');
    $sexe = trim($_POST["sexe"]);
    $adresse = trim($_POST["adresse"]);
    $mot_de_passe = $_POST["mot_de_passe"];
    $mot_de_passe_confirme = $_POST["mot_de_passe_confirme"];

    if ($mot_de_passe === $mot_de_passe_confirme) {
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);

        try {
            $connexion->beginTransaction();

            // 1. Insérer dans users
            $stmt = $connexion->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->execute([':email' => $email, ':password' => $mot_de_passe_hash]);
            $user_id = $connexion->lastInsertId();

            // 2. Insérer dans patient avec user_id
            $stmt = $connexion->prepare("
                INSERT INTO patient 
                (nom, prenom, date_naissance, lieu_de_naissance, email, telephone, groupe_sanguin, sexe, adresse, mot_de_passe, user_id) 
                VALUES (:nom, :prenom, :date_naissance, :lieu_de_naissance, :email, :telephone, :groupe_sanguin, :sexe, :adresse, :mot_de_passe, :user_id)
            ");

            $result = $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':date_naissance' => $date_naissance,
                ':lieu_de_naissance' => $lieu_de_naissance,
                ':email' => $email,
                ':telephone' => $telephone,
                ':groupe_sanguin' => $groupe_sanguin,
                ':sexe' => $sexe,
                ':adresse' => $adresse,
                ':mot_de_passe' => $mot_de_passe_hash,
                ':user_id' => $user_id
            ]);

            $connexion->commit();

            if ($result) {
                $_SESSION['login_error'] = '<div class="alert alert-success alert-dismissible fade show">
                    Inscription réussie. Vous pouvez maintenant vous connecter.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                $_SESSION['login_error'] = '<div class="alert alert-warning alert-dismissible fade show">
                    Erreur lors de l\'inscription. Veuillez réessayer.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

            header('Location: Formulaire_d_inscriptions.php');
            exit;

        } catch (Exception $e) {
            $connexion->rollBack();
            $_SESSION['login_error'] = "<div class='alert alert-danger alert-dismissible fade show'>
                Erreur : " . $e->getMessage() . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            header('Location: Formulaire_d_inscriptions.php');
            exit;
        }

    } else {
        $_SESSION['login_error'] = '<div class="alert alert-danger alert-dismissible fade show">
            Les mots de passe ne correspondent pas. Veuillez réessayer.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header('Location: Formulaire_d_inscriptions.php');
        exit;
    }
}
?>