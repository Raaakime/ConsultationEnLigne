
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
 
<?php
// Paramètres de connexion
include "../page-include/config.php";

// Fonction pour forcer le téléchargement
function forceDownload($filePath) {
    if (file_exists($filePath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    } else {
        echo "Fichier introuvable.";
    }
}

// Télécharger si "download" est spécifié
if (isset($_GET['download']) && !empty($_GET['download'])) {
    $fileToDownload = '../Rejoindre/uploads/' . basename($_GET['download']);
    forceDownload($fileToDownload);
}

// Afficher les demandes
echo "<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f9f9f9;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #007bff;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: aqua;
    }
    h2 {
            text-align: center;
            font-weight: bold;
            color: #007bff;
        }
    .btn {
        padding: 5px 10px;
        text-decoration: none;
        font-size: 14px;
        margin: 2px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-delete {
        background-color: #f44336;
        color: white;
    }
    .btn-confirm {
        background-color: #4CAF50;
        color: white;
    }

 .pending-btn {
  background-color: #f0ad4e; /* couleur orange */
  color: white;
  padding: 4px 10px;
  border-radius: 4px;
  text-decoration: none;
}

.pending-btn:hover {
  background-color: #ec971f;
}

.alert {
  padding: 10px;
  margin: 15px 0;
  border-radius: 5px;
  font-weight: bold;
}
.alert-success { background-color: #dff0d8; color: #3c763d; }
.alert-danger  { background-color: #f2dede; color: #a94442; }
.alert-warning { background-color: #fcf8e3; color: #8a6d3b; }
</style>";

$sql = "SELECT * FROM formulaire";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Liste des Demandes reçus</h2>";
    echo "<table>";
    echo "<tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Poste</th>
            <th>Message</th>
            <th>CV</th>
            <th>Lettre de motivation</th>
            <th>Actions</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nom"] . "</td>
                <td>" . $row["prenom"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["telephone"] . "</td>
                <td>" . $row["poste"] . "</td>
                <td>" . $row["message"] . "</td>
                <td><a href='?download=" . urlencode($row["cv"]) . "'>Télécharger le CV</a></td>
                <td><a href='?download=" . urlencode($row["lettre_motivation"]) . "'>Télécharger la Lettre de Motivation</a></td>
                <td>
                    <a href='Confirmer_les_demandes.php?id=" . $row["id"] . "' class='btn btn-confirm'onclick=\"return confirm('Vous voulez accepter la demande?')\"><i class='fa-solid fa-thumbs-up'></i></a>
                                        <a href='Confirmer_les_demandes.php?id=" . $row["id"] . "' class='action-btn pending-btn' onclick=\"return confirm('Voulez-vous vraiment mettre cette demande en attente ?')\"><i class='fa-solid fa-clock'></i></a>
                    <a href='Supprimer_les_demandes.php?id=" . $row["id"] . "' class='btn btn-delete' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')\"><i class='fa-solid fa-trash'></i></a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<h2>Aucune donnée trouvée.</h2>";
}

$conn->close();
?>
<a href="index.php" style='text-decoration:none; color: #007bff; font-weight:bold;'>Retour à l'administration</a>  

<?php
session_start();
include "../page-include/config.php";

if (isset($_GET['id'], $_GET['statut'])) {
    $id = intval($_GET['id']);
    $statut = $_GET['statut'];

    $valeurs_autorisées = ["confirme", "attente", "reporter"];
    $libelle = [
        "confirme" => "confirmée",
        "attente" => "mise en attente",
        "reporter" => "reportée"
    ];

    if (in_array($statut, $valeurs_autorisées)) {
        $sql = "UPDATE formulaire SET statut='" . $libelle[$statut] . "' WHERE id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $_SESSION["message"] = "✅ Demande " . $libelle[$statut] . " avec succès.";
            } else {
                $_SESSION["message"] = "❌ Erreur : " . $stmt->error;
            }
            $stmt->close();
        } else {
            $_SESSION["message"] = "❌ Erreur de requête.";
        }
    } else {
        $_SESSION["message"] = "❗ Statut invalide.";
    }
}

$conn->close();
header("Location: rejoindre_nous.php");
exit;
?>

<?php
session_start();
if (isset($_SESSION["message"])) {
    echo "<div class='alert alert-info'>" . $_SESSION["message"] . "</div>";
    unset($_SESSION["message"]);
}
?>