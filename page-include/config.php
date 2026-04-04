

<?php

// Connexion à la base de données
$nom_serveur = "localhost";
$nom_utilisateur = "root";
$mot_de_passe = "";
$nom_base_de_donnees = "medlink";



$connexion = new mysqli($nom_serveur, $nom_utilisateur, $mot_de_passe, $nom_base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}


try {
    // Connexion à la base
    $connexion = new PDO("mysql:host=$nom_serveur;dbname=$nom_base_de_donnees;charset=utf8", $nom_utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>