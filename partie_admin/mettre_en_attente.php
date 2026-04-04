<?php
session_start();
include "../page-include/config.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message_error"] = "❌ Identifiant non valide.";
    header("Location: les_rendez_vous_prise.php");
    exit;
}

$id = intval($_GET["id"]);

try {
    // Vérifier si le rendez-vous existe
    $check = $connexion->prepare("SELECT rendez_vousID FROM rendez_vous WHERE rendez_vousID = :id");
    $check->execute(['id' => $id]);

    if ($check->rowCount() === 0) {
        $_SESSION["message_error"] = "❌ Aucun rendez-vous trouvé avec cet identifiant.";
    } else {
        // Mettre à jour le statut
        $stmt = $connexion->prepare("UPDATE rendez_vous SET statut = :statut WHERE rendez_vousID = :id");
        $stmt->execute([
            'statut' => 'en attente',
            'id' => $id
        ]);
        $_SESSION["alert-warning"] = "✅ Rendez-vous mis en attente avec succès.";
    }
} catch (PDOException $e) {
    $_SESSION["message_error"] = "❌ Erreur : " . $e->getMessage();
}

header("Location: les_rendez_vous_prise.php");
exit;
?>