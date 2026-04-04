<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réinitialisation de mot de passe</title>
    <link rel="stylesheet" href="../css/réinisalisations.css" />
    <!-- Ajout de Bootstrap pour les styles des alertes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container bg-info col-5">
          <?php 
    session_start();

if (isset($_SESSION['feedback'])) {
    echo $_SESSION['feedback'];
    unset($_SESSION['feedback']); // Nettoyage après affichage

}
?>
    <h2 class="mt-3 mb-4 text-white">Réinitialisation du mot de passe</h2>
    <!-- Modification : méthode POST et action vers un script PHP -->
    <form id="formReinitialisation" method="POST" action="send_reset.php">
        <div class="form-group">
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Entrez votre email"
                required
                class="form-control"
            />
        </div>
        <button type="submit" class="btn btn-primary mt-4 p-2">Envoyer un lien de réinitialisation</button>
    </form>

</body>
</html>