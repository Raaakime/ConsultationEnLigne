<?php
session_start();
include "../page-include/config.php"; // ton fichier de connexion PDO
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'prendre_rendez_vous') {
    $nom = $_POST['nom_du_patient'];
    $prenom = $_POST['prenom_du_patient'];
    $date_naissance = $_POST['date_naissance'];
    $medecin_choisi = $_POST['medecin_choisi'];
    $date_heure = $_POST['date_heure'];
    $motif = $_POST['motif'];

    // Vérifier que le médecin existe
    $verifMedecin = $connexion->prepare("SELECT id FROM medcin WHERE id = :id");
    $verifMedecin->execute(['id' => $medecin_choisi]);

    if ($verifMedecin->rowCount() === 0) {
        $_SESSION['success'] = 
       "<div class='container alert alert-danger alert-dismissible fade show'>
                ❌ Le médecin sélectionné n'existe pas.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        header("Location: Pris_rendez_vous.php");
        exit;
    }

    $verifPatient = $connexion->prepare("SELECT id FROM patient WHERE nom = :nom AND prenom = :prenom AND date_naissance = :date_naissance");
$verifPatient->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'date_naissance' => $date_naissance
]);

if ($verifPatient->rowCount() === 0) {
    $_SESSION['success'] = 
    "<div class='container alert alert-danger alert-dismissible fade show'>
                ❌ Ce patient n'est pas encore inscrit dans le système.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    header("Location: Pris_rendez_vous.php");
    exit;
}

    // Insertion du rendez-vous
    $sql = "INSERT INTO rendez_vous (nom_du_patient, prenom_du_patient, date_naissance, medecin_choisi, date_heure, motif)
            VALUES (:nom, :prenom, :date_naissance, :medecin_choisi, :date_heure, :motif)";
    
    $stmt = $connexion->prepare($sql);

    try {
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'medecin_choisi' => $medecin_choisi,
            'date_heure' => $date_heure,
            'motif' => $motif
        ]);

    header("Location: ../Partie_patient/mes_rdv.php");
    exit;

    } catch (PDOException $e) {
        $_SESSION['success'] =
          "<div class='container alert alert-danger alert-dismissible fade show'>
                ❌ Erreur lors de l'enregistrement : 
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>" . $e->getMessage();
        header("Location: Pris_rendez_vous.php");
        exit;
    }
}
?>