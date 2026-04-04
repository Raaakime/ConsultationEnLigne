<?php
session_start();
include "../page-include/config.php"; // $connexion = new PDO(...)
include "../page-include/envoyer_message.php"; // fonction envoyerEmail()

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        // Mise à jour du statut
        $sql = "UPDATE formulaire SET statut = :statut WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            'statut' => 'confirmé',
            'id' => $id
        ]);

        // Récupération des infos utilisateur
        $stmtUser = $connexion->prepare("SELECT email, nom FROM formulaire WHERE id = ?");
        $stmtUser->execute([$id]);
        $user = $stmtUser->fetch();

        if ($user) {
            $email = $user['email'];
            $nom = htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8');

            $sujet = "Confirmation de votre demande";
            $contenu = "
                <p>Bonjour $nom,</p>
                <p>Votre demande a été <strong>confirmée</strong> avec succès.</p>
                <p>Nous vous remercions pour votre intérêt et vous contacterons très bientôt.</p>
                <p>Cordialement,<br>L’équipe technique AKNMédiconnected</p>
            ";

            if (envoyerEmail($email, $sujet, $contenu)) {
                $_SESSION["message"] = "✅ Demande confirmée et email envoyé à $nom.";
            } else {
                $_SESSION["message"] = "⚠️ Demande confirmée mais l'email n'a pas pu être envoyé.";
            }
        } else {
            $_SESSION["message"] = "❌ Utilisateur introuvable.";
        }

    } catch (PDOException $e) {
        $_SESSION["message"] = "Erreur : " . $e->getMessage();
    }
} else {
    $_SESSION["message"] = "ID invalide.";
}

header('Location: rejoindre_nous.php');
exit;
?>