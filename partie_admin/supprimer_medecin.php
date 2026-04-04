  
  <?php

// Connexion à la base de données
include "../page-include/config.php";

try {
    $bdd = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mdb);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if(isset($_GET['id'])) {
    $getid = $_GET['id'];
    if(!empty($getid)) {
        echo "ID reçu : $getid<br>";
        $recuputlisateur = $bdd->prepare('SELECT * FROM medcin WHERE id=?');
        $recuputlisateur->execute(array($getid));

        if($recuputlisateur->rowCount() > 0){
            $bannirutilisateur = $bdd->prepare('DELETE FROM medcin WHERE id=?');
            $bannirutilisateur->execute(array($getid));
           $_SESSION["message_delete"] = "❌ Médecin supprimé avec succès pour l'ID $getid.<br>";

          

            // Réinitialiser l'auto-incrémentation
            $bdd->exec("ALTER TABLE medcin AUTO_INCREMENT = 1");

            // Redirection après la suppression
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
