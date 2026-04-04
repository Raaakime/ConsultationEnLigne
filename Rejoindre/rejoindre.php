
<?php
session_start();


// Connexion à la base de données
include __DIR__ . "/../page-include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sécuriser les données pour l'affichage HTML
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $poste = htmlspecialchars($_POST['poste']);
    $message = htmlspecialchars($_POST['message']);

    // Dossier pour les fichiers
    $RejoindreDir = 'uploads/';
    if (!is_dir($RejoindreDir)) {
        mkdir($RejoindreDir, 0777, true);
    }

    // Gestion du fichier CV
    $cvPath = null;
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $cvName = uniqid() . '_' . basename($_FILES['cv']['name']);
        $cvPath = $RejoindreDir . $cvName;
        move_uploaded_file($_FILES['cv']['tmp_name'], $cvPath);
    }

    // Gestion de la lettre de motivation
    $lettreMotivationPath = null;
    if (isset($_FILES['lettre_motivation']) && $_FILES['lettre_motivation']['error'] === UPLOAD_ERR_OK) {
        $lettreName = uniqid() . '_' . basename($_FILES['lettre_motivation']['name']);
        $lettreMotivationPath = $RejoindreDir . $lettreName;
        move_uploaded_file($_FILES['lettre_motivation']['tmp_name'], $lettreMotivationPath);
    }

    // Requête préparée
    $sql = "INSERT INTO formulaire (nom, prenom, email, telephone, poste, message, cv, lettre_motivation)
            VALUES (:nom, :prenom, :email, :telephone, :poste, :message, :cv, :lettre)";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telephone', $telephone);
    $stmt->bindParam(':poste', $poste);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':cv', $cvPath);
    $stmt->bindParam(':lettre', $lettreMotivationPath);
   if ($stmt->execute()) {
        $_SESSION['form_message'] = "✅ Données enregistrées avec succès.";
    } else {
        $_SESSION['form_message'] = "❌ Erreur lors de l'enregistrement.";
    }

    $connexion=null;

    // Rediriger vers la page du formulaire
    header("Location: Rejoindre_nous.php");
    exit();
}
?>