<?php
session_start();

if (!isset($_GET['file']) || !isset($_GET['rendez_vousID'])) {
    die("Paramètres manquants.");
}

$rendezVousId = intval($_GET['rendez_vousID']);
$file = basename($_GET['file']);

// Vérifier que le patient connecté correspond bien
if (!isset($_SESSION['rendez_vousID']) || $_SESSION['rendez_vousID'] != $rendezVousId) {
    die("Accès refusé.");
}

$uploadDirectory = __DIR__ . "/../Partie_medcin/uploads/" . $rendezVousId ;
$filePath = $uploadDirectory . $file;

if (!file_exists($filePath)) {
    die("Fichier introuvable : " . htmlspecialchars($filePath));
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filePath));
readfile($filePath);
exit;
?>