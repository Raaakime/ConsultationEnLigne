
<!DOCTYPE html>
<html>
<head>
    <title>Les messages des utilisateurs </title>
   <link rel="stylesheet" href="../css/contactsutili_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="mt-3 fw-bold">Message des utilisateurs</h2>
<?php
session_start();
if (isset($_SESSION["message"])) {
    $type = strpos($_SESSION["message"], "✅") !== false ? "success" : "danger";
    echo '<div class="container mt-4">
            <div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                ' . $_SESSION["message"] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>      
          </div>';
    unset($_SESSION["message"]);
}
?>
<?php
// Connexion à la base de données
include "../page-include/config.php";

// Requête pour récupérer les données de la table 'contact'
$sql = "SELECT ContactID, nom, prenom, contactinfo, objet, message FROM contact";
$resultat = $connexion->query($sql);

if ($resultat->rowCount() > 0) {
    echo "<table class='table table-striped table-hover'>
            <tr class='table-dark'>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email ou téléphone</th>
                <th>Objet</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>";
    // Afficher les données dans chaque ligne du tableau
    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . $row['nom'] . "</td>
                <td>" . $row['prenom'] . "</td>
                <td>" . $row['contactinfo'] . "</td>
                <td>" . $row['objet'] . "</td>
                <td>" . $row['message'] . "</td>
                <td>
                    <a href='confirmer_un_contact.php?id=" . $row['ContactID'] . "' class='action-btn confirm-btn'onclick=\"return confirm('Êtes-vous sûr de vouloir confirmer cette demande ?')\"><i class='fa-solid fa-thumbs-up'></i></a> 
                    <a href='supprimer_un_contact.php?id=" . $row['ContactID'] . "' class='action-btn delete-btn'onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')\"><i class='fa-solid fa-trash'></i></a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Aucun enregistrement trouvé.";
}

// Fermer la connexion
$pdo=null;
?>
<br>
<a href="index.php" style='text-decoration:none;background-color: #007bff; color:white; font-weight:bold;padding:14px; border-radius:5px;'>  <i class="fas fa-arrow-left"></i> Retour à l'administration</a>


