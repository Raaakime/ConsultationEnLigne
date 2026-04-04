<?php
session_start();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulaire de conexions</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/form_de_connexion.css" />
  </head>
  <body>
  <?php


if (isset($_SESSION['feedback'])) {
    echo $_SESSION['feedback'];
    unset($_SESSION['feedback']); // Nettoyage après affichage
}
?>
      <?php if (isset($_SESSION['login_error'])): ?>
        <div class="container error-message mt-2">
            <?php 
            echo $_SESSION['login_error'];
            unset($_SESSION['login_error']); // Effacer le message après affichage
            ?>
        </div>
      <?php endif; ?>

    <div class="container container1 d-flex justify-content-around">
      <div class="text-white pt-5">
        <h2 class="fw-bold pt-5">Bienvenu au AKN MédiConnect</h2>
        <p>Vous etes nouveau? Cliquez-vous sur crée un compte</p>
        <button class="btn btn-outline-light bg-light" type="button">
          <a href="../Option_sur_les_compte/Option.html">Crée un compte</a>
        </button>
       
      </div>

      <div>
        <div class="Formulair bg-light" id="connexion">
          <div class="text-center mb-3">
            <a href="../index.html" class="text-decoration-none">
              <h2 class="text-dark fw-bold">
                AKN <br />
                <span class="text-danger fw-bold">MédiConnect</span>
              </h2>
            </a>
            <img src="../images/logo.png" style="width: 60px; height: 60px" />
          </div>
          <span class="fw-bold">Connectez:</span>
          <form
            id="Formulaire_de_connexion"
            action="connexion.php"
            method="POST"
            class="contact-form"
            enctype="multipart/form-data"
          >
            <div class="dysl">
              <div class="form-group">
                <input
                  type="email"
                  id="email"
                  name="email"
                  required=""
                  placeholder="Adresse email"
                />
              </div>

              <div class="form-group">
                <label for=""></label>
                <input
                  type="Password"
                  id="mote_de_passe"
                  name="mot_de_passe"
                  required=""
                  placeholder="Mote de passe"
                />
                
              </div>
            </div>

            <button class="btn btn-primary" type="submit">Connexion</button>
          </form>

          <a
            href="../Page_de_reinitialisation/réinisalisation.php"
            target="_blank"
            >Mote de passse oublié</a
          >
        </div>
      </div>
    </div>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
