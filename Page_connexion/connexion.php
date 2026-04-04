<?php
session_start(); // Toujours en haut

// Affichage des erreurs (utile en dev)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base
include "../page-include/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Vérification dans la table des médecins
    $stmt = $connexion->prepare("SELECT * FROM medcin WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $medcin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification dans la table des patients
    $stmt = $connexion->prepare("SELECT * FROM patient WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si médecin trouvé et mot de passe correct
    if ($medcin && password_verify($mot_de_passe, $medcin['mot_de_passe'])) {
        $_SESSION['id_medcin'] = $medcin['id'];
        $_SESSION['nom_medcin'] = $medcin['nom'];
        $_SESSION['prenom_medcin'] = $medcin['prenom'];

        header("Location: ../Partie_medcin/page_principale_medecin.php");
        exit();
    }

    // Si patient trouvé et mot de passe correct
    elseif ($patient && password_verify($mot_de_passe, $patient['mot_de_passe'])) {
        $_SESSION['id_patient'] = $patient['id'];
        $_SESSION['nom_patient'] = $patient['nom'];
        $_SESSION['prenom_patient'] = $patient['prenom'];

        header("Location: ../Partie_patient/page_principale_patient.php");
        exit();
    }

    // Sinon, erreur
    else {
        $_SESSION['login_error'] = '<div class="alert alert-danger alert-dismissible fade show">Email ou mot de passe incorrect. Veuillez réessayer.
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location: ../Page_connexion/Formulaire_de_connexion.php");
        exit();
    }
}
?><?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
include "../page-include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = trim($_POST['email'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    // Vérifier les informations de connexion dans la base de données des médecins
    $sql_medcins = "SELECT * FROM medcin WHERE email = :email";
    $stmt = $connexion->prepare($sql_medcins);
    $stmt->execute(['email' => $email]);
    $utilisateur_medcins = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier les informations de connexion dans la base de données des patients
    $sql_patients = "SELECT * FROM patient WHERE email = :email";
    $stmt = $connexion->prepare($sql_patients);
    $stmt->execute(['email' => $email]);
    $utilisateur_patients = $stmt->fetch(PDO::FETCH_ASSOC);

    // Connexion médecin
    if ($utilisateur_medcins && password_verify($mot_de_passe, $utilisateur_medcins['mot_de_passe'])) {
        $nom = $utilisateur_medcins['nom'];
        $prenom = $utilisateur_medcins['prenom'];

        // Stocker dans la session
        $_SESSION['nom_medcin'] = $nom;
        $_SESSION['prenom_medcin'] = $prenom;
        $_SESSION['id_medcin'] = $utilisateur_medcins['id'];

        // Redirection avec nom et prénom dans l'URL
        header("Location: ../Partie_medcin/page_principale_medecin.php?nom=" . urlencode($nom) . "&prenom=" . urlencode($prenom));
        exit();
    }

    // Connexion patient
    elseif ($utilisateur_patients && password_verify($mot_de_passe, $utilisateur_patients['mot_de_passe'])) {
        $nom = $utilisateur_patients['nom'];
        $prenom = $utilisateur_patients['prenom'];

        // Stocker dans la session
        $_SESSION['nom_patient'] = $nom;
        $_SESSION['prenom_patient'] = $prenom;
        $_SESSION['id_patient'] = $utilisateur_patients['id'];


//    // Récupérer le rendez_vousID confirmé
// $sql_rv = "SELECT rendez_vousID 
//            FROM rendez_vous 
//            WHERE nom_du_patient = :nom 
//              AND prenom_du_patient = :prenom 
//              AND statut = 'confirmé' 
//            LIMIT 1";
// $stmt_rv = $connexion->prepare($sql_rv);
// $stmt_rv->execute([
//     'nom' => $patient['nom'],
//     'prenom' => $patient['prenom']
// ]);
// $rv = $stmt_rv->fetch(PDO::FETCH_ASSOC);

// if ($rv) {
//     $_SESSION['rendez_vousID'] = $rv['rendez_vousID'];
// } else {
//     $_SESSION['rendez_vousID'] = null;
// }


        // Redirection avec nom et prénom dans l'URL
        header("Location: ../Partie_patient/page_principale_patient.php?nom=" . urlencode($nom) . "&prenom=" . urlencode($prenom));
        exit();
    }

    // Erreur de connexion
    else {
        $_SESSION['login_error'] = '<div class="alert alert-danger alert-dismissible fade show">Email ou mot de passe incorrect. Veuillez réessayer.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        header("Location: ../Page_connexion/Formulaire_de_connexion.php");
        exit();
    }
}
?>
