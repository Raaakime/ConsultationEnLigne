<!--Session start-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulair d'inscription pour les patients</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/formulaire_inscription_patient.css">
  </head>


  <!--include page accueil-->
  <body>
       <?php
       require "../page-include/accueil.php" ;
    ?>

      <!--session d'errreur-->
      <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-message  container">
            <?php 
            echo $_SESSION['login_error'];
            unset($_SESSION['login_error']); // Effacer le message après affichage
            ?>
        </div>
      <?php endif; ?>

    <div class="container row">
      <div
        class="Formulair bg-light pt-5 pb-5 col-sm-12 col-md-6 col-lg-6 col-12"
      >
    
        <div class="text-center mb-5">
          <h2 class="fw-bold">Inscrez-vous</h2>
        </div>
        <!--formulaire d'inscription des pateints-->
        <form
          action="formulaire_patient.php"
          method="POST"
          class="contact-form"
          enctype="multipart/form-data"
        >
          <div class="dysl">
            <div class="form-group">
              <label for="nom">Nom <span class="required">*</span></label>
              <input
                type="text"
                id="nom"
                name="nom"
                required=""
                placeholder="Nom"
              />
            </div>

            <div class="form-group">
              <label for="prenom"
                >Prénom(s) <span class="required">*</span></label
              >
              <input
                type="text"
                id="prenom"
                name="prenom"
                required=""
                placeholder="Prénom(s)"
              />
            </div>
          </div>

          <div class="dysl">
            <div class="form-group">
              <label for="date_naissance"
                >Date naissance<span class="required">*</span></label
              >
              <input
                type="date"
                id="date_naissance"
                name="date_naissance"
                required=""
                placeholder="Date naissance"
              />
            </div>

            <div class="form-group">
              <label for="lieu_de_naissance"
                >Lieu de naissance <span class="required">*</span></label
              >
              <input
                type="text"
                id="lieu_de_naissance"
                name="lieu_de_naissance"
                required=""
                placeholder="Lieu de naissance "
              />
            </div>
          </div>
          <div class="dysl">
            <div class="form-group">
              <label for="email">Email<span class="required">*</span></label>
              <input
                type="email"
                id="email"
                name="email"
                required=""
                placeholder="Adresse email"
              />
            </div>

            <div class="form-group">
              <label for="email"
                >Téléphone<span class="required">*</span></label
              >
              <input
                type="tel"
                id="telephone"
                name="telephone"
                required=""
                placeholder="Téléphone"
              />
            </div>
          </div>

          <div class="dysl">
            <div class="form-group">
              <label for="inputPassword6" class="col-form-label"
                >Mote de passe<span class="required">*</span></label
              >
              <input
                type="password"
                name="mot_de_passe"
                id=""
                class="form-control"
                aria-describedby="passwordHelpInline"
              />
            </div>

            <div class="form-group">
              <label for="inputPassword6" class="col-form-label"
                >Confirmer votre mote de passe<span class="required"
                  >*</span
                ></label
              >
              <input
                type="password"
                name="mot_de_passe_confirme"
                id=""
                class="form-control"
                aria-describedby="passwordHelpInline"
              />
            </div>
          </div>

          <div class="dysl">
            <div class="form-group">
              <label for="groupe_sanguin">Groupes sangains</label>
              <select class="w-full" name="groupe_sanguin" id="groupe_sanguin">
                <option></option>
                <option class="" value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
            </div>

            <div class="form-group">
              <label for="sexe">Sexe<span class="required">*</span></label>
              <select class="w-full" placeholder="Séléctinner" name="sexe">
                <option></option>
                <option>Masculin</option>
                <option>Féminin</option>
              </select>
            </div>
          </div>

          <div class="form-group ms">
            <label for="adresse">Adresse <span class="required">*</span></label>
            <input
              type="text"
              id="adresse"
              name="adresse"
              required=""
              placeholder="Adresse"
            />
          </div>
          <input type="hidden" name="role" value="patient" />
          <!-- Champ caché pour le rôle -->
          <button class="bnt" type="submit">Envoyer</button>
        </form>
      </div>
    </div>

    <!--include footer-->
   <?php
                  require "../page-include/footer.php" ;
        ?>
            


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
