<?php
session_start();
include "../page-include/config.php";
//Affichage tous les erreurs en testant de vore travailler mais en production on passe les pramettre 0
$error_reporting(-1);
ini_set("display_error", 1);

$email = $_POST['email'] ?? '';
$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if (empty($email) || empty($token) || empty($password)) {
    echo "<div class='alert alert-danger'>Tous les champs sont requis.</div>";
    exit();
}

// Vérification du token
$stmt = $connexion->prepare("SELECT reset_expires FROM users WHERE email = :email AND reset_token = :token");
$stmt->execute(['email' => $email, 'token' => $token]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || strtotime($user['reset_expires']) < time()) {
    echo "<div class='alert alert-danger'>Lien invalide ou expiré.</div>";
    exit();
}

if ($password !== $confirm) {
    echo "<div class='alert alert-danger'>Les mots de passe ne correspondent pas.</div>";
    exit();
}

// Nouveau mot de passe haché
$hashed = password_hash($password, PASSWORD_DEFAULT);

try {
    $connexion->beginTransaction();

    // 1. Mise à jour dans users
    $update = $connexion->prepare("UPDATE users SET password = :password, reset_token = NULL, reset_expires = NULL WHERE email = :email");
    $update->execute(['password' => $hashed, 'email' => $email]);

    // 2. Mise à jour dans patient
    $updatePatient = $connexion->prepare("UPDATE patient SET mot_de_passe = :password WHERE email = :email");
    $updatePatient->execute(['password' => $hashed, 'email' => $email]);

    // 3. Mise à jour dans medcin
    $updateMedcin = $connexion->prepare("UPDATE medcin SET mot_de_passe = :password WHERE email = :email");
    $updateMedcin->execute(['password' => $hashed, 'email' => $email]);

    $connexion->commit();

    $_SESSION['feedback'] = "<div class='alert alert-success'>Mot de passe réinitialisé avec succès. Vous pouvez maintenant vous connecter.</div>";
    header("Location: ../Page_connexion/Formulaire_de_connexion.php");
    exit();
    
} catch (Exception $e) {
    $connexion->rollBack();
    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
?>