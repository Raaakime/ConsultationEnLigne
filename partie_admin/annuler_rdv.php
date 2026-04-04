<?php
session_start();
include "../page-include/config.php"; // Doit définir $connexion comme instance PDO

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Vérifier si le rendez-vous existe
        $check = $connexion->prepare("SELECT * FROM rendez_vous WHERE rendez_vousID = :id");
        $check->execute(['id' => $id]);

        if ($check->rowCount() > 0) {
            // Mettre à jour le statut à "confirmé"
            $confirm = $connexion->prepare("UPDATE rendez_vous SET statut = :statut WHERE rendez_vousID = :id");
            $confirm->execute([
                'statut' => 'annulé',
                'id' => $id
            ]);

            $_SESSION["message_success"] = "✅ Rendez-vous annulé avec succès.";
        } else {
            $_SESSION["message_error"] = "❌ Aucun rendez-vous trouvé avec cet identifiant.";
        }
    } catch (PDOException $e) {
        $_SESSION["message_error"] = "❌ Erreur lors de la confirmation : " . $e->getMessage();
        error_log("Erreur PDO : " . $e->getMessage());
    }
} else {
    $_SESSION["message_error"] = "❌ Identifiant non valide.";
}

// Redirection vers la page de gestion
header("Location: les_rendez_vous_prise.php");
exit;
?>