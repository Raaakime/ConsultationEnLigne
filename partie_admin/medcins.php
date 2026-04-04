<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des médecins</title>
    <link rel="stylesheet" href="../css/liste_medecine.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
 
</head>
<body>

<h2>Liste des Médecins inscrits</h2>

<?php
// Connexion à la base de données
include "../page-include/config.php";

// // Afficher les messages de session
if (isset($_SESSION["message_success"])) {
    echo "<div class='container alert alert-success alert-dismissible fade show' style='background-color:rgb(155, 245, 189);color:green; padding:10px'>" . htmlspecialchars($_SESSION["message_success"]) . "</div>";
    unset($_SESSION["message_success"]);
}
if (isset($_SESSION["message_delete"])) {
    echo "<div class='alert alert-delete' style='background-color:rgb(245, 155, 155);color:red; padding:10px'>" . htmlspecialchars($_SESSION["message_error"]) . "</div>";
    unset($_SESSION["message_delete"]);
}

if (isset($_SESSION["message_error"])) {
    echo "<div class='alert alert-error' style='background-color:rgb(245, 155, 155);color:red; padding:10px'>" . htmlspecialchars($_SESSION["message_error"]) . "</div>";
    unset($_SESSION["message_error"]);
}

// Requête pour récupérer les données de la table 'medcin'
try {
    $sql = "SELECT id, nom, prenom, email, entreprise, adresse, message FROM medcin";
    $resultat = $connexion->query($sql);

    if ($resultat->rowCount() > 0) {
        echo "<table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Entreprise</th>
                    <th>Adresse</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>";
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['nom']) . "</td>
                    <td>" . htmlspecialchars($row['prenom']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['entreprise']) . "</td>
                    <td>" . htmlspecialchars($row['adresse']) . "</td>
                    <td>" . htmlspecialchars($row['message']) . "</td>
                    <td>
                        <a href='confirmer_medecin.php?id=" . $row['id'] . "' class='action-btn confirm-btn' title='Confirmer' onclick=\"return confirm('Êtes-vous sûr de vouloir accepter cette demande ?')\">
                            <i class='fa-solid fa-thumbs-up'></i>
                        </a>
                        <a href='supprimer_medecin.php?id=" . $row['id'] . "' class='action-btn delete-btn' title='Supprimer' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')\">
                            <i class='fa-solid fa-trash'></i>
                        </a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucun enregistrement trouvé.</p>";
    }
} catch (PDOException $e) {
    echo "<div class='alert-error'>Erreur lors de la récupération des médecins : " . htmlspecialchars($e->getMessage()) . "</div>";
}

// Fermer la connexion
$connexion = null;
?>

<a href="index.php" class="back-link">
    <i class="fas fa-arrow-left"></i> Retour à l'administration
</a>

</body>
</html>