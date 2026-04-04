<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Demandes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            position: sticky;
            top: 0;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0f7fa;
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            font-size: 14px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
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
            background-color: #f0ad4e;
            color: white;
        }
        .btn:hover, .pending-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-align: center;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s;
        }
        .back-link:hover {
            background-color: #0056b3;
            text-decoration: none;
        }
        .file-link {
            color: #007bff;
            text-decoration: none;
        }
        .file-link:hover {
            text-decoration: underline;
        }
        .actions-cell {
            white-space: nowrap;
        }
    </style>
</head>
<body>

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
        $_SESSION['message'] = "Fichier introuvable.";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
}

// Télécharger si "download" est spécifié
if (isset($_GET['download']) && !empty($_GET['download'])) {
    $fileToDownload = '../Rejoindre/uploads/' . basename($_GET['download']);
    forceDownload($fileToDownload);
}

// Afficher les messages de session
if (isset($_SESSION["message"])) {
    echo "<div class='alert alert-success'>" . htmlspecialchars($_SESSION["message"]) . "</div>";
    unset($_SESSION["message"]);
}

try {
    $sql = "SELECT * FROM formulaire";
    $stmt = $pdo->query($sql);
    $nb_lignes = $stmt->rowCount();

    if ($nb_lignes > 0) {
        echo "<h2>Liste des Demandes reçues</h2>";
        echo "<div style='overflow-x: auto;'>";
        echo "<table>";
        echo "<thead><tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Poste</th>
                <th>Message</th>
                <th>CV</th>
                <th>Lettre de motivation</th>
                <th>Actions</th>
              </tr></thead><tbody>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["nom"]) . "</td>
                    <td>" . htmlspecialchars($row["prenom"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["telephone"]) . "</td>
                    <td>" . htmlspecialchars($row["poste"]) . "</td>
                    <td>" . nl2br(htmlspecialchars($row["message"])) . "</td>
                    <td><a href='?download=" . urlencode($row["cv"]) . "' class='file-link'><i class='fas fa-download'></i> CV</a></td>
                    <td><a href='?download=" . urlencode($row["lettre_motivation"]) . "' class='file-link'><i class='fas fa-download'></i> Lettre</a></td>
                    <td class='actions-cell'>
                        <a href='Confirmer_les_demandes.php?id=" . $row["id"] . "' class='btn btn-confirm' onclick=\"return confirm('Voulez-vous accepter cette demande ?')\">
                            <i class='fa-solid fa-thumbs-up'></i> Accepter
                        </a>
                        <a href='Mettre_en_attente.php?id=" . $row["id"] . "' class='btn pending-btn' onclick=\"return confirm('Voulez-vous mettre cette demande en attente ?')\">
                            <i class='fa-solid fa-clock'></i> Attente
                        </a>
                        <a href='Supprimer_les_demandes.php?id=" . $row["id"] . "' class='btn btn-delete' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')\">
                            <i class='fa-solid fa-trash'></i> Supprimer
                        </a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "<h2>Aucune demande trouvée.</h2>";
    }
} catch (PDOException $e) {
    $_SESSION['message'] = "Erreur de base de données : " . $e->getMessage();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

$pdo = null;
?>

<a href="index.php" class="back-link">
    <i class="fas fa-arrow-left"></i> Retour à l'administration
</a>

</body>
</html>