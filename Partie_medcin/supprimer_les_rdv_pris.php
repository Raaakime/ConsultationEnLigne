

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
    $recuputlisateur = $bdd->prepare('SELECT * FROM rendez_vous WHERE rendez_vousID=?');
    $recuputlisateur->execute(array($getid));

    if($recuputlisateur->rowCount() > 0){
        $bannirutilisateur = $bdd->prepare('DELETE FROM rendez_vous WHERE rendez_vousID=?');
        $bannirutilisateur->execute(array($getid));

        // Redirection après la suppression
        header('Location: les_rendez_vous_prise.php');
        exit; // Assurez-vous de terminer l'exécution après la redirection

    } else {
        echo "Aucun membre n'a été trouvé.";
    }
} else {
    echo "L'identifiant n'a pas été récupéré.";
}
?>



