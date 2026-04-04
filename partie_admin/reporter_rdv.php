<?php
session_start();
include "../page-include/config.php"; // Doit définir $connexion comme instance PDO

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION["message_error"] = "❌ Identifiant invalide.";
    header("Location: les_rendez_vous_prise.php");
    exit;
}

$id = intval($_GET["id"]);

try {
    $stmt = $connexion->prepare("UPDATE rendez_vous SET statut = :statut WHERE rendez_vousID = :id");
    $stmt->execute([
        'statut' => 'reporté',
        'id' => $id
    ]);

    $_SESSION["message_success"] = "📅 Rendez-vous reporté avec succès.";
} catch (PDOException $e) {
    $_SESSION["message_error"] = "❌ Erreur lors du report : " . $e->getMessage();
    error_log("Erreur PDO : " . $e->getMessage());
}

header("Location: les_rendez_vous_prise.php");
exit;
?>