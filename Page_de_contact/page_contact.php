<?php
session_start();
include "../page-include/config.php"; // Connexion PDO

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"] ?? '';
    $prenom = $_POST["prenom"] ?? '';
    $contactinfo = $_POST["contactinfo"] ?? '';
    $objet = $_POST["objet"] ?? '';
    $message = $_POST["message"] ?? '';

    try {
        $sql = "INSERT INTO contact (nom, prenom, contactinfo, objet, message)
                VALUES (:nom, :prenom, :contactinfo, :objet, :message)";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'contactinfo' => $contactinfo,
            'objet' => $objet,
            'message' => $message
        ]);

        $_SESSION["message"] = "<div class='alert alert-success alert-dismissible fade show'>✅ Nouveau enregistrement créé avec succès.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    } catch (PDOException $e) {
        $_SESSION["message"] =
       "<div class='alert alert-danger alert-dismissible fade show'>
          ❌ Erreur lors de l'enregistrement.
             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
       </div>";
        error_log("Erreur PDO formulaire contact : " . $e->getMessage());
    }

    // Redirection vers la page de contact
    header('Location: ../Page_de_contact/Page_de_contact.php');
    exit;
}
?>