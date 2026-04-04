<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fomulaire pour les médecins</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/formulaire_commercial.css">
  </head>
  <body>
    <!--Include accueil-->
      <?php
       require "../page-include/accueil.php" ;
    ?>

 <!--Session erreur-->
    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="container error-message">
            <?php 
            echo $_SESSION['login_error'];
            unset($_SESSION['login_error']); // Effacer le message après affichage
            ?>
        </div>
    <?php endif; ?>
    <!--Contenu formulaire des entreprises médical-->

    <div class="container row">
  
      <div class="Formulair bg-light pt-5 pb-5 col-sm-12 col-md-6 col-lg-6 col-12">
        
        <div class="text-center mb-5">
          <h2 class="fw-bold">Plus d’informations</h2>
          <p>Demander une démonstration avec notre équipe commerciale</p>
        </div>
            <!--Formulaire-->
        <form
          action="formulaire_du_médcin.php"
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
              <label for="entreprise"
                >Entreprise <span class="required">*</span></label
              >
              <input
                type="text"
                id="entreprise"
                name="entreprise"
                required=""
                placeholder="Entreprise "
              />
            </div>

            <div class="form-group">
              <label for="adresse"
                >Adresse <span class="required">*</span></label
              >
              <input
                type="text"
                id="adresse"
                name="adresse"
                required=""
                placeholder="Adresse"
              />
            </div>
          </div>
          <div class="specil form-group">
            <label for="adresse"
              >Spécialité <span class="required">*</span></label
            >
            <input
              type="text"
              id="specialite"
              name="specialite"
              required=""
              placeholder="specialité"
            />
            <br /><br />
          </div>
          <div class="specil form-group">
            <label class="lab" for="adresse"
              >Votre message <span class="required">*</span></label
            >
            <textarea class="" name="message"></textarea>
          </div>

          <input type="hidden" name="role" value="medecin" />

          <button type="submit">Envoyer</button>
        </form>
      </div>
           
    </div>

    <!--Include footer-->
      <?php
                  require "../page-include/footer.php" ;
        ?>
            

   
        <!--Footer-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
