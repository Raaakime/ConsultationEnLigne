<?php
session_start();
include "../page-include/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $rendezVousId = $_POST['patient_id']; // ID du rendez-vous choisi

    // Créer un dossier spécifique au rendez-vous
    $uploadDirectory = "../Partie_medcin/uploads/" . $rendezVousId ;
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
    $targetFile = $uploadDirectory . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    $_SESSION['form_message'] = "
        <div class='container alert alert-success alert-dismissible fade show'>
            ✅ Le fichier a été ajouté avec succès.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    header("Location: ../Partie_medcin/ajout_fichier.php");
    exit();
} else {
    $_SESSION['form_message'] = "
        <div class='container alert alert-danger alert-dismissible fade show'>
            ❌ Erreur lors du téléchargement du fichier.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    header("Location: ../Partie_medcin/ajout_fichier.php");
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Fichier Médical</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      rel="stylesheet"
    />
    <style>
       *{
    font-weight: bold;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    text-decoration: none;
    list-style: none;
    margin: 0;
    padding: 0;
}

header {
    background: linear-gradient(135deg, #3A7BD5 0%, #00D2FF 100%);
}
.notifcation-tab{
      display: none;
      position: absolute; 
      right: 7px; 
      top: 100px;
      width: 300px; border: 1px solid #ccc;
      height: 400px; 
      background-color: white; 
      z-index: 1000;
      box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
}

.userpicture{
    border-radius: 100%;
}

.profi{
    display: none;
    position: absolute;
    right: 5px;
    top: 80px;
    height: 290px;
    width: 250px;
    box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
}

.border-0{
   width: 100%;
    cursor:text;
    color: white;
  
}

.border-0:hover {
    background-color:gainsboro;
    
}

.coll{
    background-color: gainsboro;
    box-shadow:  0 0 10px 0 rgba(86, 74, 245, 0.2);
}

footer a{
    text-decoration: none;
    color: white;
}

.iconn{
    width: 35px;
    margin:40px 8px;
    
}

.sect {
  max-width: 600px;
  margin: 40px auto;
  background: #f9f9f9;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  overflow: hidden;
  margin-top: 150px;
}

.headerr {
  background: #495bfd;
  color: #fff;
  padding: 15px;
  text-align: center;
}

.headerr h1 {
  margin: 0;
  font-size: 1.5rem;
}

.containerr {
  padding: 20px;
}

.containerr label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
  color: #333;
}

.containerr select,
.containerr input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #bbb;
  border-radius: 5px;
  transition: border-color 0.3s;
}

.containerr select:focus,
.containerr input[type="file"]:focus {
  border-color: #495bfd;
  outline: none;
}

.containerr input[type="submit"] {
  width: 100%;
  padding: 12px;
  background: #495bfd;
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s;
}

.containerr input[type="submit"]:hover {
  background: #2f3ecf;
}
    </style>
</head>
<body>
<header class="bg-light  fixed-top fw-bold">
      <nav class="navbar navbar-expand-lg text-center">
      <img class="ms-5" style="width: 60px; height: 60px" src="../images/logo.png" />
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
                            href="../profil/profil.php"
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

            <div id="message-drawer" class="notifcation-tab ">
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
                    class="btn btn-primary dropdown-toggle text-white border-0 fw-bold"
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
                            <span class="text-dark"></span
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
                    class="btn btn-primary dropdown-toggle text-white border-0 fw-bold"
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
                    class="btn btn-primary dropdown-toggle text-white border-0 fw-bold"
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

<div class="sect">
<?php


if (isset($_SESSION['form_message'])) {
    echo $_SESSION['form_message'];
    unset($_SESSION['form_message']); // pour ne pas réafficher à chaque fois
}
?>

    <div class="headerr">
        <h1>Ajouter un Dossier Médical</h1>
    </div>
    <div class="containerr">
        <form action="ajout_fichier.php" method="post" enctype="multipart/form-data">
            <label for="patient">Choisir un patient :</label>
            <select name="patient_id" id="patient" required>
                <?php
                session_start();
                if (!isset($_SESSION['nom_medcin']) || !isset($_SESSION['prenom_medcin'])) {
                    echo "<p>Accès refusé. Veuillez vous connecter en tant que médecin.</p>";
                    exit;
                }

                $nom = $_SESSION['nom_medcin'];
                $prenom = $_SESSION['prenom_medcin'];

                $sql = "SELECT rv.rendez_vousID, rv.nom_du_patient, rv.prenom_du_patient
                        FROM rendez_vous rv
                        JOIN medcin m ON rv.medecin_choisi = m.id
                        WHERE m.nom = :nom AND m.prenom = :prenom AND rv.statut = 'confirmé'";
                $stmt = $connexion->prepare($sql);
                $stmt->execute(['nom' => $nom, 'prenom' => $prenom]);
                $patientsConfirmes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($patientsConfirmes as $p) {
                    echo "<option value='{$p['rendez_vousID']}'>" .
                          htmlspecialchars($p['prenom_du_patient'] . " " . $p['nom_du_patient']) .
                          "</option>";
                }
                ?>
            </select>

            <label for="file">Sélectionnez un fichier :</label>
            <input type="file" name="file" id="file" required>
            <br><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</div>
   <?php
                  require "../page-include/footer.php" ;
        ?>

  <script src="../JS/script_patient.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>