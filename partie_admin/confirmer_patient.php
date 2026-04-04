<?php
session_start();
include "../page-include/config.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        $stmt = $connexion->prepare("UPDATE patient SET confirme = 1 WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $_SESSION["message_success"] = "✅ Patient confirmé avec succès.";
    } catch (PDOException $e) {
        $_SESSION["message_error"] = "❌ Erreur : " . $e->getMessage();
    }
} else {
    $_SESSION["message_error"] = "❌ Patient supprimé avec succès..";
}

header("Location: patients.php");
exit;
?>