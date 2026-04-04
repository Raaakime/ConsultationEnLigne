<?php
session_start();
?>
<?php

$nom = isset($_GET['nom']) ? $_GET['nom'] : '';
$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : '';

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pris_rendez_vous</title>
    <link rel="stylesheet" href="../css/prise_rendezvous.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
     />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
     
  <header class="bg-light fixed-top fw-bold">
      <nav class="navbar navbar-expand-lg text-center">
      <img class="ms-5" style="width: 50px; height: 50px" src="../images/logo.png" />
        <h5 class="fw-bolder text-white">
          AKN <span class="text-danger fw-bold">MédiConnect</span>
        </h5>
        <div style="margin-left: 100px" class="container-fluid text-center">
          <a
            class="navbar-brand text-white"
            href="../index.html"
            >Accueil</a
          >
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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white fw-bold"
                  aria-current="page"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  >Services
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item text-primary text-center"
                      href="../Gestion_de_patient/gestion.php"
                      >Gestion des patients</a
                    >
                  </li>

                  <li>
                    <a
                      class="dropdown-item text-primary text-center"
                      href="../Téléconsult/Teleconsultation.php"
                      >Consultation en ligne</a
                    >
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href=""
                  role="button"
                  data-bs-toggle="dropdown"
                >
                  Avis et Contact
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item text-primary text-center"
                      href="../Avis/avis.php"
                      >Avis et notes
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item text-primary text-center"
                      href="../Page_de_contact/Page_de_contact.php"
                      >Contact-SN</a
                    >
                  </li>
                </ul>
              </li>
            </ul>

            <div
              class="popover-region popover-region-notifications collapsed me-2 "
              id="nav-notification-popover-container"
              data-userid=""
              data-region="popover-region"
            >
              <div
                class="popover-region-toggle nav-link icon-no-margin"
                data-region="popover-region-toggle"
                role="button"
                aria-controls="popover-region-container-67c9b7a02f90067c9b7a01d75d5"
                aria-haspopup="true"
                aria-label="Afficher la fenêtre des notifications sans nouvelle notification"
                tabindex="0"
                id=""
                onclick="toggleNotifications()"
              >
                <i
                  class="icon fa-regular fa-bell"
                  title="Ouvrir/fermer le menu notifications"
                  id=""
                ></i>
              </div>
            </div>

            <div
              class="popover-region collapsed"
              data-region="popover-region-messages"
              id="popover-message-region"
            >
              <a
                id=""
                class="nav-link popover-region-toggle position-relative icon-no-margin m-2"
                href="#"
                role="button"
                onclick="toggleMessageDrawer()"
              >
                <i
                  class="icon fa-regular fa-message"
                  title="Ouvrir/fermer le tiroir des messages"
                  id="message-icon"
                ></i>
              </a>
              <span
                class="sr-only sr-only-focusable"
                data-region="jumpto"
                tabindex="-1"
              ></span>
            </div>

            <div
              class="d-flex align-items-stretch usermenu-container"
              data-region="usermenu"
              id=""
            >
              <div class="usermenu" id="">
                <div class="dropdown" id="">
                  <a
                    href="#"
                    role="button"
                    id="user-menu-toggle"
                    data-toggle="dropdown"
                    aria-label="Menu utilisateur"
                    aria-haspopup="true"
                    aria-controls="user-action-menu"
                    class="btn dropdown-toggle"
                    aria-expanded="false"
                    onclick="toggleUserMenu()"
                  >
                    <span class="userbutton" id="">
                      <span class="avatars" id="">
                        <span
                          class="avatar current"
                          id=""
                        >
                          <img
                            src="https://secure.gravatar.com/avatar/2057cce50086d79cd8f6926b02378561?s=35&amp;d=mm"
                            class="userpicture defaultuserpic"
                            width="35"
                            height="35"
                            alt=""
                            id=""
                          />
                        </span>
                      </span>
                    </span>
                  </a>
                  <div
                    id="user-action-menu"
                    class="profi dropdown-menu dropdown-menu-right"
                  >
                    <!-- Contenu du menu utilisateur ici -->
                    <div
                      id="usermenu-carousel"
                      class="carousel slide"
                      data-touch="false"
                      data-interval="false"
                      data-keyboard="false"
                    >
                      <i
                        class="fas fa-times float-end"
                        onclick="toggleUserMenu()"
                      ></i>
                      <div class="carousel-inner text-center" id="">
                        <div
                          id="carousel-item-main"
                          class="carousel-item active"
                          role="menu"
                          tabindex="-1"
                          aria-label="Utilisateur"
                        >
                          <a
                            id="accessibilitysettings-control"
                           href="../Profil_patient/profil.php?nom=<?php echo urlencode($nom); ?>&prenom=<?php echo urlencode($prenom); ?>"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            aria-label="Accessibilité"
                          >
                            Profil
                          </a>

                          <div class="dropdown-divider"></div>

                          <a
                            href="../Partie_patient/dossiers_medi.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Dossiers médicaux
                          </a>

                          <a
                            href="../Partie_patient/Calendrier.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Calendrier
                          </a>

                          <a
                            href="../Prise un rendez vous/Pris_rendez_vous.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Prise de rendez-vous
                          </a>

                               <a
                            href="../Partie_patient/mes_rdv.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Statut de mes rendez vous
                          </a>

                          <a
                            href="#"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                          >
                            
                       
                          </a>
                     <a
                           href="../Page_historiue_de_consult/Historique_de_consult.html"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                          >
                          
                            Historique des Consultations
                          </a>

                          

                          <div class="dropdown-divider"></div>


                          <a href="../Partie_patient/deconnexion.php" class="dropdown-item mt-2  fw-bold"
                            role="menuitem"
                            tabindex="-1" >Se déconnecter</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="message-drawer" class="notifcation-tab">
              <i
                class="fas fa-times float-end" 
                onclick="toggleMessageDrawer()"
              ></i>
              <!-- Contenu du tiroir des messages ici -->
              <div class="notification-table">
                <p>
                  <strong>Notifications</strong>
                </p>
                <div class="dropdown pt-3">
                <button
                    class="btn btn-primary dropdown-toggle border-0 fw-bold"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Favoris
                  </button>
                  <ul
                    class="dropdown-menu border-0"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <div>
                      <span class="avatars" id="">
                        <span
                          class="avatar current ms-5"
                          id=""
                        >
                        <a href="#" class="text-decoration-none">
                            <img
                              src="https://secure.gravatar.com/avatar/2057cce50086d79cd8f6926b02378561?s=35&amp;d=mm"
                              class="userpicture defaultuserpic"
                              width="35"
                              height="35"
                              alt=""
                              id="" />
                              <span style="
                               color: #64a44e;" class="contact-status icon-size-2 online">
                               <i class="icon fa fa-circle-check fa-fw" style="font-size:10px; border:none;" title="En ligne" role="img" aria-label="En ligne">
                  
                             </i> 
                           </span>
                            <span class="text-dark"><?php echo $prenom . ' ' . $nom; ?></span
                            ><i
                              class="icon fa fa-chevron-right fa-fw"
                              style=" border:none;"
                              aria-hidden="true"
                            ></i
                          ></a>
                        </span>
                      </span>
                    </div>
                  </ul>
                </div>
                <hr />
                <div class="dropdown pt-4">
                  <button
                    class="btn btn-primary dropdown-toggle border-0 fw-bold"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Favoris
                  </button>
                  <ul
                    class="dropdown-menu border-0"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <div class="text-center text-dark fs-6">
                      Pas de conversion de groupe
                    </div>
                  </ul>
                </div>
                <hr />
                <div class="dropdown pt-4">
                  <button
                    class="btn btn-primary dropdown-toggle border-0 fw-bold"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Favoris
                  </button>
                  <ul
                    class="dropdown-menu border-0"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <div class="text-center text-dark fs-6">
                      Pas de conversion de groupe
                    </div>
                  </ul>
                </div>
              </div>
            </div>

            <div id="notifications-table" class="notifcation-tab">
              <!-- Contenu du tableau de notification ici -->
              <i 
                class="fas fa-times float-end"
                onclick="toggleNotifications()"
                
              ></i>
              <div class="notification-table">
                <div class="d-flex justify-content-between mt-4">
                  <div>
                    <p><strong class="ms-3">Notifications</strong></p>
                  </div>
                  <div class="me-3">
                    <a href=""
                      ><i class="fa-duotone fa-solid fa-check text-dark"></i>
                    </a>
                    <a href="#">
                      <i class="fa-duotone fa-solid fa-gear ms-3 text-dark"></i
                    ></a>
                  </div>
                </div>
                <hr />
                <div class="fs-6">Vous n’avez pas de notification</div>
              </div>
            </div>

          </div>
        </div>
      </nav>
    </header>

    
  <main class="">
     <br><br><br><br>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="container">
            <i class="bi bi-check-circle-fill me-2"></i>
        
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']); // Nettoyer après affichage
            ?>
        </div>
    <?php endif; ?>
        <div class="container-form">
      <div class="Formulair bg-light pt-5 pb-5">
        <h1 class="text-center">Prise de rendez-vous</h1>

        <div class="formu mt-5" id="pointersurform">
          <form
            action="gestion_rendez_vous.php"
            id="formprisederendezvous"
            method="POST"
            class="contact-form"
            enctype="multipart/form-data"
          >
            <input type="hidden" name="action" value="prendre_rendez_vous" />
            <div class="dysl">
              <div class="form-group">
                <label for="nom_du_patient"
                  >Nom du patient <span class="required">*</span></label
                >
                <input
                  type="text"
                  id="nom_du_patient"
                  name="nom_du_patient"
                  required=""
                  placeholder="Nom du patient"
                />
              </div>

              <div class="form-group">
                <label for="prenom_du_patient"
                  >Prénom(s) du patient <span class="required">*</span></label
                >
                <input
                  type="text"
                  id="prenom_du_patient"
                  name="prenom_du_patient"
                  required=""
                  placeholder="Prénom du patient"
                />
              </div>
            </div>

            <div class="dysl">
              <div class="form-group">
                <label for="date_de_naissance"
                  >Date de naissance<span class="required">*</span></label
                >
                <input
                  type="date"
                  id="date_naissance"
                  name="date_naissance"
                  required=""
                  placeholder="Date de naissance"
                />
              </div>

              <div class="form-group">
            <label for="medecin_choisi">Médecins disponible<span class="required">*</span></label>
            <select id="medecin_choisi" name="medecin_choisi" required>
            <?php
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=localhost;dbname=medlink", "root", "");
    $sql = "SELECT id, nom, prenom, specialite FROM medcin";
    $result = $bdd->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $row['id'] . "'>" ."Dr ". $row['prenom']  . " ".  $row['nom'] . " - " . $row['specialite'] . "</option>";
    }
    ?>
            </select>
        </div>
        </div>


            <div class="dysl">
              <div class="form-group">
                <label class="" for="adresse"
                  >Date et heure souhaitées :
                  <span class="required">*</span></label
                >
                <input type="datetime-local" name="date_heure" />
  </div>
              <div class="form-group">
                <label class="" for="motif"
                  >Motif du rendez-vous : <span class="required">*</span></label
                >
                <textarea class="" name="motif" required></textarea>
              </div>
            </div>

            <input
              type="submit"
              id="consultationBtn"
              class="bnt"
              value="Prendre rendez-vous"
            />
          </form>
       
      </div>
  </div>
  </div>

  </main>

       <?php
                  require "../page-include/footer.php" ;
        ?>


<script src="../JS/script_patient.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
