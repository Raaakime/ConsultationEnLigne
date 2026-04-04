<?php
// Informations du patient (à récupérer depuis la base ou formulaire si nécessaire)
$to = $row['email_du_patient']; // Assure-toi que ce champ est disponible
$subject = "Modification de votre rendez-vous";
$message = "Bonjour " . $row['prenom_du_patient'] . ",\n\n".
           "Votre rendez-vous avec le Dr " . $row['medecin_choisi'] . " a été modifié.\n".
           "🗓️ Nouvelle date et heure : " . date('d/m/Y H:i', strtotime($_POST['date_heure'])) . "\n".
           "📋 Motif : " . $_POST['motif'] . "\n\n".
           "Merci de vérifier les détails et nous contacter si nécessaire.\n\n".
           "Bien cordialement,\nClinique Médicale";

$headers = "From: contact@clinique-medicale.com\r\n" .
           "Reply-To: contact@clinique-medicale.com\r\n" .
           "Content-Type: text/plain; charset=UTF-8";

// Envoi de l'email
mail($to, $subject, $message, $headers);
?>