  
  <?php
// Connexion à la base de données
include "../page-include/config.php";

try {
    $bdd = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mdb);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si la colonne 'confirme' existe
    $result = $bdd->query("SHOW COLUMNS FROM medcin LIKE 'confirme'");
    $exists = ($result->rowCount()) ? true : false;

    if(!$exists) {
        // Ajouter le champ confirme à la table medecin
        $sql = "ALTER TABLE medcin ADD confirme TINYINT(1) DEFAULT 0";
        $bdd->exec($sql);
        echo "Champ 'confirme' ajouté avec succès.<br>";
    } else {
        echo "La colonne 'confirme' existe déjà.<br>";
    }

    // Réinitialiser l'auto-incrémentation
    $bdd->exec("ALTER TABLE medcin AUTO_INCREMENT = 1");

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

if(isset($_GET['id'])) {
    $getid = $_GET['id'];
    if(!empty($getid)) {
        echo "ID reçu : $getid<br>";
        $recuputlisateur = $bdd->prepare('SELECT * FROM medcin WHERE id=?');
        $recuputlisateur->execute(array($getid));

        if($recuputlisateur->rowCount() > 0){
            $confirmerutilisateur = $bdd->prepare('UPDATE medcin SET confirme=1 WHERE id=?');
            $confirmerutilisateur->execute(array($getid));
         
                    $_SESSION["message"] = "La demande a été exécutée avec succès.";

            // Redirection après la confirmation
            header('Location: medcins.php');
            exit; // Assurez-vous de terminer l'exécution après la redirection
        } else {
            echo "Aucun médecin n'a été trouvé pour l'ID $getid.<br>";
        }
    } else {
        echo "L'identifiant est vide.<br>";
    }
} else {
    echo "L'identifiant n'a pas été récupéré.<br>";
}
?>
