<?php
session_start();
include "../page-include/config.php"; // Connexion PDO

try {
    $bdd = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $_SESSION["message"] = "❌ Erreur de connexion : " . $e->getMessage();
    header('Location: admin_contact.php');
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        $stmt = $bdd->prepare("SELECT * FROM contact WHERE ContactID = ?");
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $delete = $bdd->prepare("DELETE FROM contact WHERE ContactID = ?");
            $delete->execute([$id]);

            $_SESSION["message"] = "✅ Contact supprimé avec succès.";
        } else {
            $_SESSION["message"] = "❌ Aucun contact trouvé avec l'ID $id.";
        }
    } catch (PDOException $e) {
        $_SESSION["message"] = "❌ Erreur lors de la suppression : " . $e->getMessage();
        error_log("Erreur PDO suppression contact admin : " . $e->getMessage());
    }
} else {
    $_SESSION["message"] = "❌ Identifiant non valide.";
}

header('Location: contact.php');
exit;
?>