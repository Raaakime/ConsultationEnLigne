<?php
session_start();
include "../page-include/config.php";

// Affichage des messages de session
foreach (['message_success', 'message_attente', 'message_error'] as $msg) {
    if (isset($_SESSION[$msg])) {
        switch ($msg) {
            case 'message_success':
                $class = 'success';
                break;
            case 'message_attente':
                $class = 'warning';
                break;
            case 'message_error':
                $class = 'danger';
                break;
            default:
                $class = 'info';
                break;
        }
        echo "<div class='alert alert-$class'>" . htmlspecialchars($_SESSION[$msg]) . "</div>";
        unset($_SESSION[$msg]);
    }
}

// Requête avec jointure pour récupérer le nom du médecin
$sql = "SELECT rv.rendez_vousID, rv.nom_du_patient, rv.prenom_du_patient, rv.date_naissance,
               rv.date_heure, rv.motif, rv.statut,
               m.nom AS nom_medecin, m.prenom AS prenom_medecin
        FROM rendez_vous rv
        JOIN medcin m ON rv.medecin_choisi = m.id
        ORDER BY rv.date_heure DESC";

$resultat = $connexion->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Table des Patients ayant pris un RDV</title>
    <link rel="stylesheet" href="../css/rendezvous_priseAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <style>
 thead.head_t th {
    background-color: #495bfdff;
    color: #fff;
    font-weight: bold;
}

   </style>
</head>
<body class="container mt-4">

<h2 class="text-center text-primary fw-bold mb-4">Liste des Rendez-vous Patients</h2>

<?php if ($resultat->rowCount() > 0): ?>
<table class="table table-bordered">
    <thead  class="head_t">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Médecin</th>
            <th>Date & Heure</th>
            <th>Motif</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $resultat->fetch(PDO::FETCH_ASSOC)): 
        $statut = $row['statut'];
        switch ($statut) {
            case 'confirmé':
                $badge = "<span class='badge bg-success'><i class='fa fa-check-circle me-1'></i> Confirmé</span>";
                break;
            case 'en attente':
                $badge = "<span class='badge bg-warning text-dark'><i class='fa fa-hourglass-half me-1'></i> En attente</span>";
                break;
            case 'reporté':
                $badge = "<span class='badge bg-info text-dark'><i class='fa fa-calendar-alt me-1'></i> Reporté</span>";
                break;
            case 'annulé':
                $badge = "<span class='badge bg-secondary'><i class='fa fa-ban me-1'></i> Annulé</span>";
                break;
            default:
                $badge = "<span class='badge bg-light text-dark'><i class='fa fa-question-circle me-1'></i> Indéfini</span>";
                break;
        }
    ?>
        <tr>
            <td><?= htmlspecialchars($row['nom_du_patient']) ?></td>
            <td><?= htmlspecialchars($row['prenom_du_patient']) ?></td>
            <td><?= htmlspecialchars($row['date_naissance']) ?></td>
            <td><?= htmlspecialchars($row['prenom_medecin'] . ' ' . $row['nom_medecin']) ?></td>
            <td><?= htmlspecialchars($row['date_heure']) ?></td>
            <td><?= htmlspecialchars($row['motif']) ?></td>
            <td><?= $badge ?></td>
            <td class="d-flex gap-1 flex-wrap">
                <a href="confirmer_les_rdv_pris.php?id=<?= $row['rendez_vousID'] ?>" class="btn btn-success btn-sm" title="Confirmer" onclick="return confirm('Confirmer ce rendez-vous ?')">
                    <i class="fa-solid fa-thumbs-up"></i>
                </a>
                <a href="mettre_en_attente.php?id=<?= $row['rendez_vousID'] ?>" class="btn btn-warning btn-sm" title="Mettre en attente" onclick="return confirm('Mettre ce rendez-vous en attente ?')">
                    <i class="fa-solid fa-clock"></i>
                </a>   <a href="annuler_rdv.php?id=<?= $row['rendez_vousID'] ?>&statut=annulé" class="btn btn-secondary btn-sm" title="Annuler" onclick="return confirm('Annuler ce RDV ?')">
                    <i class="fa-solid fa-ban"></i>
                </a>
                <a href="reporter_rdv.php?id=<?= $row['rendez_vousID'] ?>" class="btn btn-info btn-sm" title="Reporter" onclick="return confirm('Reporter ce rendez-vous ?')">
                    <i class="fa-solid fa-calendar-alt"></i>
                </a>
                <a href="supprimer_les_rdv_pris.php?id=<?= $row['rendez_vousID'] ?>" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Supprimer ce rendez-vous ?')">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php else: ?>
    <p class="alert alert-info">Aucun rendez-vous trouvé.</p>
<?php endif; ?>

<a href="index.php" class="btn btn-outline-primary mt-4">
    <i class="fas fa-arrow-left"></i> Retour à l'administration
</a>

</body>
</html>