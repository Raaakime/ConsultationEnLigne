<?php
session_start(); // Démarrer la session pour stocker le message

// Connexion à la base de données
include "../page-include/config.php";

try {
    $bdd = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fonction pour ajouter la colonne 'confirme' si elle n'existe pas
    function ajouterColonneConfirme($bdd) {
        $result = $bdd->query("SHOW COLUMNS FROM contact LIKE 'confirme'");
        if ($result->rowCount() === 0) {
            $bdd->exec("ALTER TABLE contact ADD confirme TINYINT(1) DEFAULT 0");
            echo "✅ Champ 'confirme' ajouté avec succès.<br>";
        } else {
            echo "ℹ️ La colonne 'confirme' existe déjà.<br>";
        }
    }

    // Fonction pour confirmer un contact par ID
    function confirmerContact($bdd, $id) {
        $stmt = $bdd->prepare("SELECT * FROM contact WHERE ContactID = ?");
        $stmt->execute([$id]);

        if ($stmt->rowCount() > 0) {
            $update = $bdd->prepare("UPDATE contact SET confirme = 1 WHERE ContactID = ?");
            $update->execute([$id]);

            // Journalisation
            file_put_contents('log.txt', "Contact confirmé : $id à " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);

            // Stocker le message de succès dans la session
            $_SESSION['message'] = "✅ Confirmation réussie pour le contact ID $id.";

            // Redirection
            header('Location: contact.php');
            exit;
        } else {
            echo "❌ Aucun contact trouvé pour l'ID $id.<br>";
        }
    }

    // Appel des fonctions
    ajouterColonneConfirme($bdd);

    // Traitement de l'ID reçu via GET
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        $getid = intval($_GET['id']);
        echo "🔍 ID reçu : $getid<br>";
        confirmerContact($bdd, $getid);
    } else {
        echo "⚠️ Identifiant invalide ou non fourni.<br>";
    }

} catch (PDOException $e) {
    die("💥 Erreur de connexion : " . $e->getMessage());
}
?>