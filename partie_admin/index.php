
<?php

session_start();
if(!$_SESSION['mdp']){
    header('Location: admin.php');
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard avec Sidebar</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
  rel="stylesheet"
/>
    <link rel="stylesheet" href="../css/admin_sibar.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar" class="bg-primary text-white text-center">
  <div class="text-center py-3">
  <h4 class="fw-bolder px-2">AKN <br>MédiConnected  admin</h4>
  <img src="../images/logo.png" class="w-50 mt-2 mb-3 " alt="">
<ul class="nav flex-column">
    <li class="nav-item">
        <a href="#" class="nav-link text-white fw-bold ">
            <i class="bi bi-house-door"></i> Accueil
        </a>
    </li>

    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link text-white fw-bold  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-people"></i> Utilisateurs
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="patients.php">Patients</a></li>
            <li><a class="dropdown-item text-primary" href="medcins.php">Médecins</a></li>
        </ul>
    </li>

   
    <li class="nav-item dropdown">
        <a href="#" class="nav-link text-white fw-bold  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-calendar"></i> Rendez-vous
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="les_rendez_vous_prise.php">Les rendez vous pris</a></li>
            <li><a class="dropdown-item text-primary" href="../Page_historiue_de_consult/Historique_de_consult.html">Historique historique de consultation</a></li>
        </ul>
        </li>

        <li class="nav-item dropdown">
        <a href="#" class="nav-link text-white fw-bold  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-envelope"></i> Contacts
        </a>
        <ul class="dropdown-menu">
            
            <li><a class="dropdown-item text-primary" href="contact.php">Message des utilisateurs</a></li>
            <li><a class="dropdown-item text-primary" href="rejoindre_nous.php">Demandes</a></li>
            <li><a class="dropdown-item text-primary" href="avis_cat.php">Avis des utilisateurs</a></li>
        </ul>
        </li> 

       <li class="nav-item dropdown">
        <a href="#" class="nav-link text-white fw-bold  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bar-chart-line"></i> Statistiques
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="#rapport">Rapport mensuel</a></li>
           
        </ul>
  </li>

 <li class="nav-item dropdown">
        <a href="#" class="nav-link text-white fw-bold  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="bi bi-exclamation-triangle"></i> Alerts
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="#">Danger</a></li>
          
        </ul>
        </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link text-white fw-bold  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear"></i> Paramètres
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="nondispo.php">Compte</a></li>
            <li><a class="dropdown-item text-primary" href="nondispo.php">Préférences</a></li>
        </ul>
    </li>
</ul>
<div class="dropdown-divider"></div>
                         
          <div class="bg-danger  mx-2 rounded-2 mt-5" style="padding: 8px; ">      
              <a href="admin.php" class="dropdown-item  fw-bold " role="menuitem" tabindex="-1">Se déconnecter</a>
           </div>  
</div>
   
    </div>
     <!-- Flèche pour afficher/masquer la sidebar -->
     <span id="toggleSidebar" class="text-white fs-4" style="cursor: pointer;"><i class="bi bi-arrow-left-circle-fill text-primary"></i></span>
      <!-- Contenu principal -->
      <div id="content" class="container-fluid py-4">
      <h1 class="fw-bold text-primary text-center">Tableau de bord</h1>
        <div class="d-flex justify-content-around align-items-center rounded-3 py-3 mt-3" style="background-color:white; box-shadow:2px 2px 4px blue; ">
         
       
      
        <div class="row ">
  <div class="col-md-12">
    <div class="card bg-primary text-white">
      <div class="card-body d-flex align-items-center justify-content-between">
        <!-- Icône et texte alignés horizontalement -->
        <div class="d-flex align-items-center">
          <i class="bi bi-people me-2 fs-3"></i> <!-- Icône avec marge à droite -->
          <h5 class="mb-0">Utilisateurs</h5>
        </div>
        <!-- Nombre aligné à droite -->
        <p id="users" class="mb-0 fs-4">0</p>
      </div>
    </div>
  </div>
</div>

<div class="row ">
  <div class="col-md-12">
    <div class="card bg-success text-white">
      <div class="card-body d-flex align-items-center justify-content-between">
        <!-- Icône et texte alignés horizontalement -->
        <div class="d-flex align-items-center">
        <i class="bi bi-bar-chart-line me-2 fs-3"></i> <!-- Icône avec marge à droite -->
          <h5 class="mb-0">Revenus</h5>
        </div>
        <!-- Nombre aligné à droite -->
        <p id="revenues" class="mb-0 fs-4">0</p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card bg-danger text-white">
      <div class="card-body d-flex align-items-center justify-content-between">
        <!-- Icône et texte alignés horizontalement -->
        <div class="d-flex align-items-center ">
        <i class="bi bi-exclamation-triangle me-2 fs-3"></i> <!-- Icône avec marge à droite -->
          <h5 class="mb-0">Alerts</h5>
        </div>
        <!-- Nombre aligné à droite -->
        <p id="alerts" class="mb-0 fs-4">0</p>
      </div>
    </div>
  </div>
</div>
        </div>
        <div class="container mt-5">
      <h2 class="text-center fw-bold" id="rapport">Taux de consultations par mois</h2>
      <canvas id="consultationChart"></canvas>
    </div>

      </div>
    </div>


   
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>



    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../JS/p_admin.js"></script>



    </script>
  </body>
</html>
