<?php
session_start();
include "../page-include/config.php";

$token = $_GET['token'] ?? '';
$email = $_GET['email'] ?? '';

// Vérification du token
$stmt = $connexion->prepare("SELECT reset_expires FROM users WHERE email = :email AND reset_token = :token");
$stmt->execute(['email' => $email, 'token' => $token]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || strtotime($user['reset_expires']) < time()) {
    echo "<div class='alert alert-danger'>Lien invalide ou expiré.</div>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nouveau mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            font-weight: bold;
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
            text-decoration: none;
            list-style: none;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            background-color: white;
            padding: 40px;
            box-shadow: 0 10px 10px rgba(0, 0, 10, 0.1);
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }

        .container h2 {
            margin-bottom: 20px;
            color: rgba(40, 95, 245, 0.989);
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            background-color: rgba(40, 95, 245, 0.989);
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Réinitialisation du mot de passe</h2>
    <!-- Formulaire de nouveau mot de passe -->
    <form method="post" action="update_password.php">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <div class="mb-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
        </div>

        <button type="submit">Réinitialiser</button>
    </form>
</div>

</body>
</html>