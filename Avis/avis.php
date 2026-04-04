<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis des Utilisateurs</title>
    <style>
        *{
    font-weight: bold;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    text-decoration: none;
    list-style: none;
  
}
        body {
          
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .containeravis {
            max-width: 800px;
            margin: 100px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background: linear-gradient(135deg, #458aeb 0%, #F5F9FF 100%);
        }

        .h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        .avis {
            margin-top: 30px;
        }

        .review-item {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .p {
            margin: 5px 0;
        }
        footer a{
    text-decoration: none;
    color: white;
}

.iconn{
    width: 35px;
    margin:40px 8px;
}
    </style>
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
</head>
<body>
    <!--include page accueil-->
  <?php
       require "../page-include/accueil.php" ;
    ?>
<br><br>
       <?php
        // Connexion à la base de données
       include "../page-include/config.php";

        try {
            $connexion = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees;charset=utf8", $nom_utilisateur, $mot_de_passe);
             $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Gestion de l'envoi du formulaire
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $categorie = htmlspecialchars($_POST["categorie"]);
                $note = intval($_POST["note"]);
                $avis = htmlspecialchars($_POST["avis"]);

                $sql = "INSERT INTO avis (categorie, note, avis) VALUES (?, ?, ?)";
                $stmt = $connexion ->prepare($sql);
                $stmt->execute([$categorie, $note, $avis]);

                echo "<div class='container alert alert-success alert-dismissible fade show mt-5'>
                    Votre avis a été enregistré avec succès !
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }

            // Récupération des avis existants
            $sql = "SELECT categorie, note, avis FROM avis ORDER BY id DESC";
            $stmt =  $connexion ->query($sql);
            $avisList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<p class='p' style='color: red; text-align: center;'>Erreur : " . $e->getMessage() . "</p>";
            die();
        }
        ?>

    <!--container principale avis des utilisateurs--->
    <div class="container containeravis col-md-12 col-lg-6 col-12">
        <h1 class="h1">Avis des Utilisateurs</h1>


        <!-- Formulaire pour soumettre un avis -->
        <form id="formAvis" method="POST">
            <label for="categorie">Catégorie :</label>
            <select name="categorie" id="categorie" required>
                <option value="Médecin">Médecin</option>
                <option value="Patient">Patient</option>
                <option value="Personnel">Personnel de santé</option>
                <option value="Entreprise">Entreprise de santé</option>
            </select>

            <label for="note">Note (1 à 5) :</label>
            <input type="number" name="note" id="note" min="1" max="5" required>

            <label for="avis">Votre avis :</label>
            <textarea name="avis" id="avis" rows="5" required></textarea>

            <button type="submit">Soumettre votre avis</button>
        </form>

        <!-- Section pour afficher les avis -->
        <div class="avis">
            <h2>Avis déjà soumis</h2>
            <div id="listeAvis">
                <?php
                // Afficher les avis
                foreach ($avisList as $avis) {
                    echo "<div class='review-item'>";
                    echo "<p class='p'><strong>Catégorie :</strong> " . htmlspecialchars($avis['categorie']) . "</p>";
                    echo "<p class='p'><strong>Note :</strong> " . htmlspecialchars($avis['note']) . " étoiles</p>";
                    echo "<p class='p'><strong>Avis :</strong> " . htmlspecialchars($avis['avis']) . "</p>";
                    echo "<hr>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
            <!--Include page rejoindre-->
            <?php
                  require "../page-include/rejoind.php" ;
              ?>
   
            <!---Include page footer-->
        <?php
                  require "../page-include/footer.php" ;
        ?>
  
      <!--Les scripts-->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({});
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
</body>
</html>