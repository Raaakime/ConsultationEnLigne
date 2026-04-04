<?php

session_start();
 if(isset($_POST['valider'])){
    if (!empty ($_POST['email']) AND !empty($_POST['mdp'])){
  $email_par_default = "admin@gmail.com";
  $mdp_par_default = "admin1234";

  $email_saisi = htmlspecialchars($_POST['email']);
  $mdp_saisi = htmlspecialchars($_POST['mdp']);
 
  if($email_par_default == $email_saisi AND $mdp_par_default == $mdp_saisi){
  $_SESSION['mdp'] = $mdp_saisi;
 header('Location: index.php');
  }else {
        // Version améliorée du message d'erreur
    $_SESSION['login_error'] = '<br><b style="color: white;">Email ou mot de passe incorrect. Veuillez réessayer.</b>';
   
  }
    }else{
        echo "Veillez completer tous les champs...";
    }
 }

?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Formulaire de conexions admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/admin_connexion.css" />
  </head>
  <body>
    <div class="container bg-primary d-flex justify-content-around">
      <div class="text-white pt-5">
        <h2 class="fw-bold pt-5 text-center">Bienvenu au partie admin de AKN MédiConnect</h2>
        <p class="text-center">Vous etes aministrateur? Veillez enterer vos indentifiants</p>
        <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-message">
            <?php 
            echo $_SESSION['login_error'];
            unset($_SESSION['login_error']); // Effacer le message après affichage
            ?>
        </div>
    <?php endif; ?>
      </div>

      <div>
        <div class="Formulair bg-light" id="connexion">
        <div class="text-center mb-3">
            <a
              href="../index.html"
              class="text-decoration-none"
            >
              <h2 class="text-dark fw-bold">
                AKN <br />
                <span class="text-danger fw-bold">MédiConnect</span>
              </h2>
            </a>
            <img
              src="../images/logo.png"
              style="width: 60px; height: 60px;"
            />
          </div>
          <span class="fw-bold">Connectez:</span>
          <form
            id="Formulaire_de_connexion"
            action=""
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
                  placeholder="email"
                />
              </div>

              <div class="form-group">
                <label for=""></label>
                <input
                  type="Password"
                  id="mote_de_passe"
                  name="mdp"
                  required=""
                  placeholder="Mote de passe"
                />
              </div>
            </div>

            <input class="btn btn-primary" type="submit" name="valider" value="Connexion"/>
          </form>

          <a href="../Page_de_reinitialisation/réinisalisation.php" target="blink"
            >Mote de passse oublié</a
          >
        </div>
      </div>
    </div>

    <style type="text/css">
     
    </style>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
