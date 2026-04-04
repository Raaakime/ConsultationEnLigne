<?php
session_start();
session_start();
include "../page-include/config.php"; // $connexion = new PDO(...)
include "../page-include/envoyer_message.php"; // fonction envoyerEmail()

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];


    try {
        $sql = "UPDATE formulaire SET statut = :statut WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            'statut' => 'attente',
            'id' => $id
        ]);

          // Récupération des infos utilisateur
        $stmtUser = $connexion->prepare("SELECT email, nom FROM formulaire WHERE id = ?");
        $stmtUser->execute([$id]);
        $user = $stmtUser->fetch();
 if ($user) {
            $email = $user['email'];
            $nom = htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8');

            $sujet = "Mise en attente de votre demande";
            $contenu = "
                <p>Bonjour $nom,</p>
                <p>Votre demande a été <strong>mis en attente,</strong> en examen vos dossiers.</p>
                <p>Nous vous remercions pour votre comprèhension et vous contacterons très bientôt.</p>
                <p>Cordialement,<br>L’équipe technique AKNMédiconnected.</p>
            ";

            if (envoyerEmail($email, $sujet, $contenu)) {
                $_SESSION["message"] = "✅ Demande est mettre en attente et email envoyé à $nom.";
            } else {
                $_SESSION["message"] = "⚠️ Demande est en attente mais l'email n'a pas pu être envoyé.";
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