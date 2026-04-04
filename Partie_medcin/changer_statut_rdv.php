<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

header('Content-Type: text/html; charset=UTF-8');
include "../page-include/config.php";

// Charge les variables d’environnement
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Mise à jour du statut du rendez-vous

if (isset($_GET['id']) && isset($_GET['statut'])) {
    $id = $_GET['id'];
    $statut = $_GET['statut'];
    try {
        // 1. Met à jour le statut du rendez-vous
        $updateStmt = $connexion->prepare("UPDATE rendez_vous SET statut = :statut WHERE rendez_vousID = :id");
        $updateStmt->execute(['statut' => $statut, 'id' => $id]);

        // 2. Récupère les infos du patient lié à ce rendez-vous
        $stmt = $connexion->prepare("SELECT p.email, p.nom, p.prenom, r.date_heure, r.motif 
                                     FROM rendez_vous r 
                                    JOIN patient p ON r.nom_du_patient = p.nom AND r.prenom_du_patient = p.prenom
                                     WHERE r.rendez_vousID = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $destinataire = $row['email'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $date_heure = $row['date_heure'];
            $motif = $row['motif'];

            // 3. Prépare le contenu de l'email
          $sujet = "Mise à jour de votre rendez-vous";

$lien_visio = "https://meet.jit.si/AknMediConnect";

// Construction du contenu
$contenu = "
<p>Bonjour <strong>{$prenom} {$nom}</strong>,<br>
Votre rendez-vous a été <strong>{$statut}</strong>.<br>
📅 Date & Heure : {$date_heure}<br>
📝 Motif : {$motif}<br><br>
";

// Ajouter le lien seulement si confirmé
if (strtolower($statut) === "confirmé") {
    $contenu .= "
    🔗 Lien de visioconférence : <a href='{$lien_visio}' target='_blank'>{$lien_visio}</a><br>
    🔑 Le code d'accès sera communiqué 1 heure avant le rendez‑vous.<br><br>
    ";
}

$contenu .= "
Merci de votre confiance.<br>
L’équipe AKNMediconnected</p>
";

            // Envoi de l'email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = $_ENV['SMTP_USERNAME'];
                $mail->Password   = $_ENV['SMTP_PASSWORD'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom($_ENV['SMTP_USERNAME'], 'AKNMediconnected');
                $mail->addAddress($destinataire);
                $mail->isHTML(true);
                $mail->Subject = $sujet;
                $mail->Body    = $contenu;
                $mail->AltBody = strip_tags($contenu);

                $mail->send();
                $_SESSION['email_status'] = "Email envoyé avec succès.";
            } catch (Exception $e) {
                $_SESSION['email_status'] = "Erreur d'envoi : " . $e->getMessage();
            }
        } else {
            $_SESSION["message"] = "ID invalide.";
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Erreur lors de la mise à jour du rendez-vous : " . $e->getMessage();
    }
}

header("Location: les_rendez_vous_prise.php");
exit;
