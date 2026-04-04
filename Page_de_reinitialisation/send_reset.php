<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
include "../page-include/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
header('Content-Type: text/html; charset=UTF-8');

// Fonction de nettoyage
function nettoyerTexte($texte) {
    return htmlspecialchars(strip_tags($texte), ENT_QUOTES, 'UTF-8');
}

// Charge les variables d’environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Liste des expéditeurs
$expediteurs = [
    [
        'email' => $_ENV['SMTP_USERNAME'],
        'password' => $_ENV['SMTP_PASSWORD'],
        'name' => nettoyerTexte('Aknmédiconnected') // Nettoyage ici
    ]
];

// Destinataire
$recipient = $_POST['email'] ?? null;

if (!$recipient || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
    echo "<div style='color: red;'>❌ Adresse email invalide.</div>";
    exit();
}

// Génération du token
$token = bin2hex(random_bytes(32));
$expires = date("Y-m-d H:i:s", time() + 3600); // expire dans 1h
$stmt = $connexion->prepare("UPDATE users SET reset_token = :token, reset_expires = :expires WHERE email = :email");
$stmt->execute(['token' => $token, 'expires' => $expires, 'email' => $recipient]);
$lien = "http://localhost/AknMediConnect/Page_de_reinitialisation/reset_password.php?token=$token&email=" . urlencode($recipient);

// Envoi par chaque expéditeur
foreach ($expediteurs as $expediteur) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $expediteur['email'];
        $mail->Password   = $expediteur['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($expediteur['email'], $expediteur['name']);
        $mail->addAddress($recipient);

        $mail->isHTML(true);
        $mail->Subject = 'Réinitialisation de mot de passe';
        $mail->Body = "
            <p>Bonjour,</p>
            <p>Vous avez demandé à réinitialiser votre mot de passe. Cliquez sur le lien ci-dessous :</p>
            <p><a href='$lien'>$lien</a></p>
            <p>Ce lien expirera dans 1 heure.</p>
            <p>Si vous n’avez pas fait cette demande, ignorez simplement ce message.</p>
        ";
        $mail->AltBody = "Lien de réinitialisation : $lien";

        $mail->send();
          $_SESSION['feedback'] = "<div style='color: green;'>✅ Email envoyé avec succès par {$expediteur['name']}.</div>";
    } catch (Exception $e) {
         $_SESSION['feedback'] = "<div style='color: red;'>❌ Erreur d'envoi par {$expediteur['name']}: {$mail->ErrorInfo}</div>";
    }
}
header('Location: ../Page_de_reinitialisation/réinisalisation.php');
exit();
?>