<?php
session_start();
include "../page-include/config.php";

// Simuler l'identité du patient (à adapter selon ton système de login)
$nom_patient = $_SESSION['nom_patient'] ?? '';
$prenom_patient = $_SESSION['prenom_patient'] ?? '';

// Vérifier que le patient est bien identifié
if (empty($nom_patient) || empty($prenom_patient)) {
    echo "<p>Veuillez vous connecter pour voir vos rendez-vous.</p>";
    exit;
}

// Requête pour récupérer les RDV du patient
$sql = "SELECT rv.date_heure, rv.motif, rv.statut,
               m.nom AS nom_medecin, m.prenom AS prenom_medecin
        FROM rendez_vous rv
        JOIN medcin m ON rv.medecin_choisi = m.id
        WHERE rv.nom_du_patient = :nom AND rv.prenom_du_patient = :prenom
        ORDER BY rv.date_heure DESC";

$stmt = $connexion->prepare($sql);
$stmt->execute(['nom' => $nom_patient, 'prenom' => $prenom_patient]);
$rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mes Rendez-vous</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <style>
 thead.head_t th {
    background-color: #495bfdff;
    color: #fff;
    font-weight: bold;
}

   </style>
</head>
<body class="container mt-4">

<h2 class="mb-4 text-center text-primary fw-bold">Mes Rendez-vous</h2>

<?php if (count($rdvs) > 0): ?>
    <table class="table table-bordered">
        <thead class="head_t">
            <tr>
                <th>Médecin</th>
                <th>Date & Heure</th>
                <th>Motif</th>
                <th>Statut</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($rdvs as $rdv): 
                $statut = $rdv['statut'];
                switch ($statut) {
                    case 'confirmé':
                        $badgeClass = 'success';
                        $message = "✅ Votre rendez-vous est confirmé.";
                        break;
                    case 'rejeté':
                        $badgeClass = 'danger';
                        $message = "❌ Votre demande a été rejetée.";
                        break;
                    case 'attente':
                        $badgeClass = 'warning';
                        $message = "⏳ Votre demande est en attente de validation.";
                        break;
                    case 'annulé':
                        $badgeClass = 'secondary';
                        $message = "🚫 Ce rendez-vous a été annulé.";
                        break;
                    default:
                        $badgeClass = 'light text-dark';
                        $message = "ℹ️ Statut inconnu.";
                        break;
                }
        ?>
            <tr>
                <td><?= htmlspecialchars($rdv['prenom_medecin'] . ' ' . $rdv['nom_medecin']) ?></td>
                <td><?= htmlspecialchars($rdv['date_heure']) ?></td>
                <td><?= htmlspecialchars($rdv['motif']) ?></td>
                <td><span class="badge bg-<?= $badgeClass ?>"><?= ucfirst($statut) ?></span></td>
                <td><?= $message ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun rendez-vous trouvé.</p>
<?php endif; ?>

<a href="page_principale_patient.php" class="back-link btn btn-primary mt-4">
    <i class="fas fa-arrow-left"></i> Retour à l'administration
</a>
</body>
</html>