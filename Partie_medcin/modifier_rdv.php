
<?php
session_start();
error_reporting(E_ALL);
echo "Chargement de la page réussi<br>";

include "../page-include/config.php"; // Assure-toi que $conn est bien défini ici

if (isset($_GET['id'])) {
    echo "ID reçu : " . $_GET['id'] . "<br>";

    $id = intval($_GET['id']); // sécurité

    try {
        $stmt = $connexion->prepare("SELECT * FROM rendez_vous WHERE rendez_vousID = :id");
        $stmt->execute(['id' => $id]);

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modifier RDV</title>
                     <style>
    body {
        background-color: #f4faff;
        font-family: 'Segoe UI', sans-serif;
        color: #004080;
        padding: 20px;
    }

    form {
        background-color: #ffffff;
        border: 2px solid #cce5ff;
        border-radius: 10px;
        padding: 25px;
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 4px 8px rgba(0,0,128,0.1);
    }

    label {
        font-weight: bold;
        color: #003366;
        margin-top: 10px;
        display: block;
    }

    input[type="text"],
    input[type="date"],
    input[type="datetime-local"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0 20px 0;
        border: 1px solid #99ccff;
        border-radius: 5px;
        background-color: #f0f8ff;
    }

    input[readonly],
    textarea[readonly] {
        background-color: #e6f2ff;
        color: #003366;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    h2 {
        text-align: center;
        color: #004080;
    }
</style>
            </head>
            <body>
                <h2>Les fonctionnalités de la page ne sont pas encore disponibles, on y travaille dessus !</h2>
                <form action="les_rendez_vous_prise.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['rendez_vousID']; ?>">

                    <label>Nom du patient:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['nom_du_patient']); ?>" readonly>

                    <label>Prénom du patient:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['prenom_du_patient']); ?>" readonly>

                    <label>Date de naissance:</label>
                    <input type="date" value="<?php echo $row['date_naissance']; ?>" readonly>

                    <label>Médecin choisi:</label>
                    <input type="text" value="<?php echo htmlspecialchars($row['medecin_choisi']); ?>" readonly>

                    <label>Date et heure du RDV:</label>
                    <input type="datetime-local" name="date_heure" value="<?php echo date('Y-m-d\TH:i', strtotime($row['date_heure'])); ?>" required>

                    <label>Motif:</label>
                    <textarea name="motif" readonly><?php echo htmlspecialchars($row['motif']); ?></textarea>

                    <input type="submit" value="Mettre à jour le rendez-vous">
                </form>
            </body>
            </html>
            <?php
        } else {
            echo '❌ Rendez-vous introuvable.';
        }
    } catch (PDOException $e) {
        echo '❌ Erreur de base de données : ' . $e->getMessage();
    }
} else {
    echo '⚠️ ID non fourni.';
}
?>
</body>
</html>