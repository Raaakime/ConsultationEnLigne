<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Table des Patients</title>
   <link rel="stylesheet" href="../css/patient_inscritAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>
<body>

<h2 class="text-primary fw-bold mt-2">Liste des Patients inscris</h2>

<?php    

// Connexion à la base de données
include "../page-include/config.php";

// Afficher les messages de session
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


// Requête pour récupérer les données de la table 'patient'
$sql = "SELECT id, nom, prenom, date_naissance, lieu_de_naissance, email, telephone, groupe_sanguin, sexe, adresse FROM patient";
$resultat = $connexion->query($sql);

if ($resultat->rowCount() > 0) {
    echo "<table class=''>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Lieu de Naissance</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Groupe Sanguin</th>
                <th>Sexe</th>
                <th>Adresse</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>";

    
    while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // Génération du statut fictif
        $statut = '🕒 En attente';
        if (str_contains($row['email'], 'gmail.com')) {
            $statut = '✅ Confirmé';
        } elseif (str_contains($row['email'], 'yahoo.com')) {
            $statut = '❌ Rejeté';
        }

        echo "<tr>
                <td>" . htmlspecialchars($row['nom']) . "</td>
                <td>" . htmlspecialchars($row['prenom']) . "</td>
                <td>" . htmlspecialchars($row['date_naissance']) . "</td>
                <td>" . htmlspecialchars($row['lieu_de_naissance']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['telephone']) . "</td>
                <td style='text-align:center'>" . htmlspecialchars($row['groupe_sanguin']) . "</td>
                <td>" . htmlspecialchars($row['sexe']) . "</td>
                <td>" . htmlspecialchars($row['adresse']) . "</td>
                <td>" . $statut . "</td>
                <td>
                    <a href='confirmer_patient.php?id=" . $row['id'] . "' class='action-btn confirm-btn' onclick=\"return confirm('Confirmer ce patient ?')\"><i class='fa-solid fa-thumbs-up'></i></a><br><br>
                    <a href='supprimer_patient.php?id=" . $row['id'] . "' class='action-btn delete-btn' onclick=\"return confirm('Supprimer ce patient ?')\"><i class='fa-solid fa-trash'></i></a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Aucun enregistrement trouvé.";
}


$pdo=null;

?>
<a href="index.php" class="back-link">
    <i class="fas fa-arrow-left"></i> Retour à l'administration
</a>

</body>
</html>
