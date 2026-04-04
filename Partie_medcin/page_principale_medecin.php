<?php
session_start();
$nom = $_GET['nom'] ?? $_SESSION['nom_medcin'] ?? '';
$prenom = $_GET['prenom'] ?? $_SESSION['prenom_medcin'] ?? '';
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Partie médecin</title>
    <link rel="stylesheet" href="../css/medecins.css" />
    <style>
      @media screen and (max-width:768px) {
        .ma_section{
          display:flex;
          flex-direction:column;
           
          
        }
        
      }
    </style>
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
    <header class="fixed-top fw-bold">
      <nav class="navbar navbar-expand-lg text-center">
      <img class="ms-5" style="width: 50px; height: 50px" src="../images/logo.png" />
        <h5 class="text-dark fw-bolder text-white">
          AKN <span class="text-danger fw-bold">MédiConnect</span>
        </h5>
        <div style="margin-left: 100px" class="container-fluid text-center">
          <a class="navbar-brand text-white" href="../index.html">Accueil</a>
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
                            href="ajout_fichier.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Dossiers médicaux des patients
                          </a>

                          <a
                            href="Calendrier.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                            id=""
                          >
                            Calendrier
                          </a>

                          <a
                            href="les_rendez_vous_prise.php"
                            class="dropdown-item fw-bold"
                            role="menuitem"
                            tabindex="-1"
                          >
                           Les rendez vous pris
                          </a>

                           <a
                            href="../Consultation/videoconfirence.php"
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
                         
                          <a href="deconnexion.php" class="dropdown-item mt-3 fw-bold"
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
                    <div class="text-center fs-6">
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

  <main class="mt-5 pt-5 pb-4 col-sm-12">
    
    <section class="ma_section col-10 ">
      
      <div class="d-sm-flex align-items-center" id="">
        
        <h1 class="fw-bold fs-2 text-primary">Bonjour Dr <?php echo htmlspecialchars($prenom . ' ' . $nom); ?> &nbsp;! 👋</h1>
        <div
          class="header-actions-container ml-auto"
          data-region="header-actions-container"
        ></div>
      </div>
    </section>

    <section class="">
      <div class="container coll col-10  bg-light text-primary rounded-4 p-3">
        <div class="d-flex justify-content-center align-items-center m-auto flex-column flex-md-row">
          <div class="mt-5  mx-5 fw-bold">
            <h2 class="fw-bold text-center mt-2 fs-3 ">L' interface du médcin</h2>
            <p class="mt-2 text-center ms-3">
              Le médcin doit accueillir ou recevoir tous les informations du
              patients ses dossiers médicaux, son état de santé et en respectant
              le droit priver des patients . <br>  " <em> wëër moy loño yitél</em>"
            </p>
            
          </div>
          <div><img class="rounded-5 img-fluid" src="../images/a.png" alt="" /></div>
        </div>
      </div>
    </section>

    <section class="ma_section3 col-10" >
        <h2 class="fs-3 text-primary ms-3 mb-4 fs-4"><i class="fa-duotone fa-solid fa-stethoscope text-success"></i> Que pouvez vous faire ici !</h2>
      <div class="ma_section_div">
      

        <div class="mes_divs">
         <i class="fa-duotone fa-solid fa-file-medical fs-3 m-4"></i>
          <h4 class="fs-5">Envoi les documents médicaux</h4>
          <p>Le medecin crée un dossier médical pour chaque patient, en y ajoutant tous les documents nécessaires.</p>
        </div>

        <div class="mes_divs">
          <i class="fa-duotone fa-solid fa-calendar-days fs-3 m-4"></i>
          <h4 class="fs-5">Recevoir rendez vous des patients</h4>
          <p>Le médecin peut recevoir des demandes de rendez-vous de la part des patients, et les gérer facilement.</p>
        </div>

           <div class="mes_divs">
           <i class="fa-duotone fa-solid fa-laptop-medical fs-3 m-4"></i>
                <h4 class="fs-5">Faire une consultation</h4>
                <p>Accedez à la plateforme de téléconsultation pour avoir plus d'informations sur vos patients, leurs antécédents médicaux et les traitements en cours.</p>
           </div>

      </div>
    </section>

  </main>

     <?php
                  require "../page-include/footer.php" ;
        ?>


  <script src="../JS/script_patient.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
