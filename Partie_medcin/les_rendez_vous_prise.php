<?php

session_start();
include "../page-include/config.php";

// Vérification de session médecin
if (!isset($_SESSION['prenom_medcin']) || !isset($_SESSION['nom_medcin']))  {
    echo "<p>Accès refusé. Veuillez vous connecter en tant que médecin.</p>";
    exit;
}

$prenom = $_SESSION['prenom_medcin'];
$nom = $_SESSION['nom_medcin'];
$filtre_statut = $_GET['filtre_statut'] ?? '';

// Requête SQL avec filtre facultatif
$sql = "SELECT rv.rendez_vousID, rv.nom_du_patient, rv.prenom_du_patient, rv.date_naissance,
               m.nom AS nom_medecin, m.prenom AS prenom_medecin,
               rv.date_heure, rv.motif, rv.statut
        FROM rendez_vous rv
        JOIN medcin m ON rv.medecin_choisi = m.id
        WHERE m.nom = :nom AND m.prenom = :prenom";

$params = ['nom' => $nom, 'prenom' => $prenom];

if (!empty($filtre_statut)) {
    $sql .= " AND rv.statut = :statut";
    $params['statut'] = $filtre_statut;
}

$sql .= " ORDER BY rv.date_heure DESC";
$stmt = $connexion->prepare($sql);
$stmt->execute($params);
$rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>RDV du Médecin</title>
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

<h2 class="text-center text-primary fw-bold mb-4">Mes Rendez-vous</h2>
<?php
if (isset($_SESSION['email_status'])) {
    echo "<div class='alert alert-info alert-dismissible fade show'>" . $_SESSION['email_status'] . "
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>";
    unset($_SESSION['email_status']);
}
?>
<!-- Filtre par statut -->
<form method="GET" class="mb-3 d-flex align-items-center gap-2">
    <select name="filtre_statut" class="form-select w-auto">
        <option value="">Tous les statuts</option>
        <option value="confirmé" <?= $filtre_statut === 'confirmé' ? 'selected' : '' ?>>Confirmé</option>
        <option value="attente" <?= $filtre_statut === 'attente' ? 'selected' : '' ?>>En attente</option>
        <option value="annulé" <?= $filtre_statut === 'annulé' ? 'selected' : '' ?>>Annulé</option>
        <option value="rejeté" <?= $filtre_statut === 'rejeté' ? 'selected' : '' ?>>Rejeté</option>
    </select>
    <button type="submit" class="btn btn-outline-primary">Filtrer</button>
</form>

<?php if (count($rdvs) > 0): ?>
<table class="table table-bordered">
    <thead class="head_t">
        <tr>
            <th>Nom du patient</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Date & Heure</th>
            <th>Motif</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php


     foreach ($rdvs as $row): 
        $statut = $row['statut'];
        switch ($statut) {
            case 'confirmé':
                $badgeClass = 'success';
                $icon = 'fa-check-circle';
                break;
            case 'rejeté':
                $badgeClass = 'danger';
                $icon = 'fa-times-circle';
                break;
            case 'attente':
                $badgeClass = 'warning';
                $icon = 'fa-hourglass-half';
                break;
            case 'annulé':
                $badgeClass = 'secondary';
                $icon = 'fa-ban';
                break;
            default:
                $badgeClass = 'light text-dark';
                $icon = 'fa-info-circle';
                break;
        }
    ?>
        <tr>
            <td><?= htmlspecialchars($row['nom_du_patient']) ?></td>
            <td><?= htmlspecialchars($row['prenom_du_patient']) ?></td>
            <td><?= htmlspecialchars($row['date_naissance']) ?></td>
            <td><?= htmlspecialchars($row['date_heure']) ?></td>
            <td><?= htmlspecialchars($row['motif']) ?></td>
            <td>
                <span class="badge bg-<?= $badgeClass ?>">
                    <i class="fa <?= $icon ?> me-1"></i> <?= ucfirst($statut) ?>
                </span>
            </td>
            <td class="d-flex gap-1 flex-wrap">
                <a href="changer_statut_rdv.php?id=<?= $row['rendez_vousID'] ?>&statut=confirmé" class="btn btn-success btn-sm" title="Confirmer" onclick="return confirm('Confirmer ce RDV ?')">
                    <i class="fa-solid fa-thumbs-up"></i>
                </a>
                <a href="changer_statut_rdv.php?id=<?= $row['rendez_vousID'] ?>&statut=attente" class="btn btn-warning btn-sm" title="Mettre en attente" onclick="return confirm('Mettre en attente ce RDV ?')">
                    <i class="fa-solid fa-clock"></i>
                </a>
                <a href="changer_statut_rdv.php?id=<?= $row['rendez_vousID'] ?>&statut=annulé" class="btn btn-secondary btn-sm" title="Annuler" onclick="return confirm('Annuler ce RDV ?')">
                    <i class="fa-solid fa-ban"></i>
                </a>
                <a href="modifier_rdv.php?id=<?= $row['rendez_vousID'] ?>" class="btn btn-primary btn-sm" title="Modifier" onclick="return confirm('Modifier ce RDV ?')">
                    <i class="fa-solid fa-pen"></i>
                </a>
                <a href="supprimer_les_rdv_pris.php?id=<?= $row['rendez_vousID'] ?>" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Supprimer ce RDV ?')">
                    <i class="fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p class="alert alert-info">Aucun rendez-vous trouvé pour ce médecin.</p>
<?php endif; ?>

<a href="page_principale_medecin.php" class="btn btn-outline-primary mt-4">
    <i class="fas fa-arrow-left"></i> Retour à l'administration
</a>

</body>
</html>