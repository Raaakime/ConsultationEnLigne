<?php
session_start();
include "../page-include/config.php"; // Doit définir $connexion comme instance PDO

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisé et typé

    try {
        $sql = "DELETE FROM formulaire WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute(['id' => $id]);

        $_SESSION["message"] = "✅ Formulaire supprimé avec succès.";
    } catch (PDOException $e) {
        $_SESSION["message"] = "❌ Une erreur est survenue. Veuillez réessayer.";
        error_log("Erreur PDO lors de la suppression : " . $e->getMessage());
    }
} else {
    $_SESSION["message"] = "❌ Identifiant non valide.";
}

// Redirection (optionnelle)
header("Location: rejoindre_nous.php");
exit;


?>