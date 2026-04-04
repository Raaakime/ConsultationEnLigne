<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Avis</title>
  <link rel="stylesheet" href="../css/gestion_avis.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Avis</h1>

        <?php
        // Connexion à la base de données
   include "../page-include/config.php";

       
            // Suppression d'un avis
            if (isset($_GET['supprimer'])) {
                $id = intval($_GET['supprimer']);
                $sql = "DELETE FROM avis WHERE id = ?";
                $stmt = $connexion->prepare($sql);
                $stmt->execute([$id]);

                echo "<p style='color: green; text-align: center;'>L'avis a été supprimé avec succès !</p>";
            }

            // Récupération des avis
            $sql = "SELECT id, categorie, note, avis FROM avis ORDER BY id DESC";
            $stmt = $connexion->query($sql);
            $avisList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Catégorie</th>
                    <th>Note</th>
                    <th>Avis</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($avisList as $avis) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($avis['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($avis['categorie']) . "</td>";
                    echo "<td>" . htmlspecialchars($avis['note']) . "</td>";
                    echo "<td>" . htmlspecialchars($avis['avis']) . "</td>";
                    echo "<td><a href='avis_cat.php?supprimer=" . htmlspecialchars($avis['id']) . "'><button onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')\">Supprimer</button></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="index.php"&nbps;&nbps; style='text-decoration:none;background-color: #007bff; color:white; font-weight:bold;padding:14px; border-radius:5px;' > <i class="fas fa-arrow-left"></i> Retour à l'administration</a>
</body>
</html>