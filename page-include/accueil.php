<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../css/Accueil.css">
<style>
    a{
        text-decoration:none;
    }
</style>
</head>
<body>
      <header class=" pb-1 fixed-top fw-bold">
      <nav class="navbar navbar-expand-lg text-center col-12 col-md-12 col-lg-12">
        <img class="ms-5" style="width: 60px; height: 60px" src="../images/logo.png" />
        <h5 class="">
          <a href="../index.html" class="text-white fw-bolder">AKN <span class="text-danger fw-bold">MédiConnect</span>
        </h5>

        <div style="margin-left: 100px" class="container-fluid text-center">
          <a class="navbar-brand text-white link-primary" href="../index.html">Accueil</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white fw-bold link-primary"
                  aria-current="page"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  >Services
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item bg-white text-primary text-center"
                      class="text-white"
                      href="../Gestion_de_patient/gestion.php"
                      >Gestion des patients</a
                    >
                  </li>

                  <li>
                    <a
                      class="dropdown-item bg-white text-primary text-center"
                      class="text-white"
                      href="../Téléconsult/Teleconsultation.php"
                      >Consultation en ligne</a
                    >
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle  text-white fw-bold link-primary"
                  href=""
                  role="button"
                  data-bs-toggle="dropdown"
                >
                  Avis et Contact
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item text-primary bg-white text-center"
                      href="../Avis/avis.php"
                      >Avis et notes
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item text-primary bg-white text-center"
                      href="../Page_de_contact/Page_de_contact.php"
                      >Contact-SN</a
                    >
                  </li>
                </ul>
              </li>
            </ul>

            <a
              href="../Page_connexion/Formulaire_de_connexion.php"
              class="btn me-4 fw-bold"
              type="submit"
              style="background:white; 
                    color: #3A7BD5; 
                     border: none;
                   "
            >
              Connexion
            </a>
            <a
              href="../A propos/apropos.php"
              class="text-decoration-none me-3 p-2 rounded"
                style="background: transparent;  
                         color: #3A7BD5;  
                         border: 2px solid #3A7BD5;  
                         border-radius: 8px;  "
              >Plus d'information</a
            >
          </div>
        </div>
      </nav>
    </header>

    
</body>
</html>