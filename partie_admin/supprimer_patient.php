

<?php

// Connexion à la base de données
include "../page-include/config.php";

try {
    $bdd = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees", $nom_utilisateur, $mdb);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recuputlisateur = $bdd->prepare('SELECT * FROM patient WHERE id=?');
    $recuputlisateur->execute(array($getid));

    if($recuputlisateur->rowCount() > 0){
        $bannirutilisateur = $bdd->prepare('DELETE FROM patient WHERE id=?');
        $bannirutilisateur->execute(array($getid));

          $_SESSION["message_delete"] = "❌ Patient supprimé avec succès..";
        // Redirection après la suppression
        header('Location: patients.php');
        exit; // Assurez-vous de terminer l'exécution après la redirection

    } else {
        echo "Aucun membre n'a été trouvé.";
       
    }
} else {
    echo "L'identifiant n'a pas été récupéré.";
}
?>



