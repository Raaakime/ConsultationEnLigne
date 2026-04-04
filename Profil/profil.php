
<?php
session_start();

if (isset($_GET['prenom']) && isset($_GET['nom'])) {
    $_SESSION['prenom'] = $_GET['prenom'];
    $_SESSION['nom'] = $_GET['nom'];
}

$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil médecin</title>
    <link rel="stylesheet" href="../css/profilsM.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
   <header class="pb-1 fixed-top fw-bold">
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
                      class="dropdown-item text-primary  text-center"
                      href="../Gestion_de_patient/gestion.php"
                      >Gestion des patients</a
                    >
                  </li>

                  <li>
                    <a
                      class="dropdown-item text-primary  text-center"
                      href="../Téléconsult/Teleconsultation.php"
                      >Consultation en ligne</a
                    >
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="text-center"
                  role="button"
                  data-bs-toggle="dropdown"
                >
                  Avis et Contact
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item text-primary  text-center"
                      href="../avis/avis.php"
                      >Avis et notes </a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item text-primary  text-center"
                      href="../Page_de_contact/Page_de_contact.php"
                      >Contact-SN</a
                    >
                  </li>
                </ul>
              </li>
            </ul>

            <div
              class="popover-region popover-region-notifications collapsed me-2"
              id="nav-notification-popover-container"
              data-userid="5435"
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
                id="message-drawer-toggle-67c9b7a03077d67c9b7a01d75d6"
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
                             href="../profil/profil.php?nom=<?php echo urlencode($nom); ?>&prenom=<?php echo urlencode($prenom); ?>"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            aria-label="Accessibilité"
                          >
                            Profil
                          </a>

                          <div class="dropdown-divider"></div>

                          <a
                            href="../Partie_medcin/ajout_fichier.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Dossiers médicaux des patients
                          </a>

                          <a
                            href="../Partie_medcin/Calendrier.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Calendrier
                          </a>

                          <a
                            href="../Partie_medcin/les_rendez_vous_prise.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                          >
                           Les rendez vous pris
                          </a>
                           
                           <a
                            href="../Consultation/consultation.html"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                          >
                           Consultation en ligne
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
                         
                          <a href="../Partie_medcin/deconnexion.php" class="dropdown-item mt-3 fw-bold"
                            role="menuitem"
                            tabindex="-1">Se déconnecter</a>
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
                               color: #64a44e;" class="contact-status icon-size-2 online"><i class="icon fa fa-circle-check fa-fw "style="font-size:10px; border:none;" title="En ligne" role="img" aria-label="En ligne"> 
                               </i></span><span class="text-dark">Dr<?php echo $prenom . ' ' . $nom; ?></span
                            ><i
                              class="icon fa fa-chevron-right fa-fw"
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
                    <div class="text-center fs-6">
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
                    <div class="text-center  fs-6">
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

   
      <main class=" pb-5">
        <section class="sect">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header bg-primary text-white">
                    <h3 class="fw-bold">Profil</h3>
                  </div>
                  <div class="card-body pb-5">
                    <img
                      src="https://secure.gravatar.com/avatar/2057cce50086d79cd8f6926b02378561?s=35&amp;d=mm"
                      class="userpicture defaultuserpic img-fluid rounded-circle w-25 h-25"
                      width="35"
                      height="35"
                      alt=""
                      id=""
                    /><br>
                    <span style="
                               color: #64a44e;" class="contact-status icon-size-2 online">
                               <i class="icon fa fa-circle-check fa-fw "  style="font-size: 10px;" title="En ligne" role="img" aria-label="En ligne">
                  
                             </i> 
                           </span>
                    <h4 class="fw-bold mt-4">Dr <?php echo $prenom . ' ' . $nom; ?>
                    </h4>
                    <p><strong>Medecin</strong></p>
                    <p><strong> Spécialité:</strong> Généraliste</p>
                    <p>
                      <strong>Qualifications et Diplômes :</strong> Diplôme de
                      Médecine de l'Université de ..., Spécialisation en
                      Généraliste
                    </p>
                    <p><strong>Années d'Expérience :</strong> 15 ans</p>
                    <p><strong>Adresse:</strong> Kaolack</p>
                    <p><strong>Telephone:</strong> 77 000 00 00</p>
                    <p><strong>Email:</strong>abdoukarime01@gmail.com</p>
                    <p><strong>Langues Parlées:</strong> Français et English</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container pt-5">
            <div class="row">
              <div class="">
                <div class="card">
                  <div class="card-header bg-primary text-white">
                    <h3 class="fw-bold">Informations professionnelles</h3>
                  </div>

                  <div class="card-body">
                    <p>
                      <strong> Numéro de Licence Médicale :</strong> Généraliste
                    </p>
                    <p>
                      <strong
                        >Adhésion aux Associations Professionnelles :</strong
                      >
                      Diplôme de Médecine de l'Université de ..., Spécialisation
                      en Généraliste
                    </p>
                    <p><strong>Expérience Clinique:</strong> 15 ans</p>
                  </div>

                  <div>
                    <div class="card-header bg-primary text-white">
                      <h3 class="fw-bold">Disponibilité</h3>
                    </div>
                    <div class="card-body">
                      <p>
                        <strong>Horaires de Consultation :</strong> Lundi -
                        Vendredi : 9h00 - 17h00
                      </p>
                      <p>
                        <strong>Disponibilité pour Téléconsultation :</strong
                        >Disponible pour des consultations en ligne le mardi et
                        jeudi
                      </p>
                      <p>
                        <strong>Expérience Clinique:</strong> Pratique clinique
                        au Centre Hospitalier Universitaire de Kaolack
                      </p>
                      <p>
                        <strong
                          >Types de Consultations Disponibles (vidéo, téléphone,
                          chat) :
                        </strong>
                        Vidéo-consultation, Consultation par téléphone,
                        Consultation par chat
                      </p>
                    </div>
                  </div>

                  <div>
                    <div class="card-header bg-primary text-white">
                      <h3 class="fw-bold">Evaluations et Commentaires</h3>
                    </div>
                    <div class="card-body">
                      <p>
                        <strong> Avis des Patients :</strong> Dr Akn est très à
                        l'écoute et professionnelle. Je la recommande vivement."
                      </p>
                      <p>
                        <strong
                          >Adhésion aux Associations Professionnelles :</strong
                        >
                        Diplôme de Médecine de l'Université de ...,
                        Spécialisation en Généraliste
                      </p>

                      <p>
                        <strong>Notes et Evaluations :</strong> ★★★★☆ (4.5/5)
                      </p>
                      <div class="rating-container">
                        <h2 class="fw-bold">Évaluez votre Médecin</h2>
                        <div class="stars">
                          <span class="star" data-value="1">★</span>
                          <span class="star" data-value="2">★</span>
                          <span class="star" data-value="3">★</span>
                          <span class="star" data-value="4">★</span>
                          <span class="star" data-value="5">★</span>
                        </div>
                        <p class="average-rating fw-bold">
                          Note Moyenne : <span id="average">0</span>/5
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>

    <?php
                  require "../page-include/footer.php" ;
        ?>

      <script>
        function toggleNotifications() {
          var notificationContainer = document.getElementById(
            "notifications-table"
          );
          var messageDrawer = document.getElementById("message-drawer");
          var userMenu = document.getElementById("user-action-menu");

          // Fermer les autres popups
          messageDrawer.style.display = "none";
          userMenu.style.display = "none";

          // Basculer l'affichage de la popup de notifications
          if (notificationContainer.style.display === "none") {
            notificationContainer.style.display = "block";
          } else {
            notificationContainer.style.display = "none";
          }
        }

        function toggleMessageDrawer() {
          var notificationContainer = document.getElementById(
            "notifications-table"
          );
          var messageDrawer = document.getElementById("message-drawer");
          var userMenu = document.getElementById("user-action-menu");

          // Fermer les autres popups
          notificationContainer.style.display = "none";
          userMenu.style.display = "none";

          // Basculer l'affichage du tiroir des messages
          if (messageDrawer.style.display === "none") {
            messageDrawer.style.display = "block";
          } else {
            messageDrawer.style.display = "none";
          }
        }

        function toggleUserMenu() {
          let notificationContainer = document.getElementById(
            "notifications-table"
          );
          let messageDrawer = document.getElementById("message-drawer");
          let userMenu = document.getElementById("user-action-menu");

          // Fermer les autres popups
          notificationContainer.style.display = "none";
          messageDrawer.style.display = "none";

          // Basculer l'affichage du menu utilisateur
          if (userMenu.style.display === "none") {
            userMenu.style.display = "block";
          } else {
            userMenu.style.display = "none";
          }
        }
      </script>
      <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
          const stars = document.querySelectorAll(".star");
          let selectedValue = 0;

          stars.forEach((star) => {
            star.addEventListener("click", () => {
              selectedValue = parseInt(star.getAttribute("data-value"));
              updateStars(selectedValue);
              updateAverageRating(selectedValue);
            });

            star.addEventListener("mouseover", () => {
              const value = parseInt(star.getAttribute("data-value"));
              highlightStars(value);
            });

            star.addEventListener("mouseout", () => {
              highlightStars(0);
            });
          });

          const updateStars = (value) => {
            stars.forEach((star) => {
              star.classList.remove("selected");
              if (parseInt(star.getAttribute("data-value")) <= value) {
                star.classList.add("selected");
              }
            });
          };

          const highlightStars = (value) => {
            stars.forEach((star) => {
              star.classList.remove("highlighted");
              if (parseInt(star.getAttribute("data-value")) <= value) {
                star.classList.add("highlighted");
              }
            });
          };

          const updateAverageRating = (value) => {
            // Remplacez cette logique par celle de votre base de données pour obtenir la moyenne
            let averageRating = value;
            document.getElementById("average").innerText = averageRating;
          };
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  </body>
</html>
