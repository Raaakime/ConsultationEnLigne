<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page de contact</title>
    <link rel="stylesheet" href="../css/Page_de_contact.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <?php
session_start();
if (isset($_SESSION["message"])) :?>
<div class="container success-message">

   <?php
    echo $_SESSION["message"];
    unset($_SESSION["message"]); // Supprime le message après affichage
    ?>
</div>

<?php endif;
?>

        <?php
       require "../page-include/accueil.php" ;
    ?>

    <section>
      <div class="container d-flex mt-5 ">
        <div>
          <h1 class="text-center mb-5 fw-bold">Contactez-nous</h1>
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-12">
              <p class="fw-bold">
                “AKN MédiConnect a développé la plateforme Service-médical où
                notre centre médical spécialisé et leur <br />technologie sont
                combinés pour offrir à nos clients une solution de santé
                personnalisée axée sur l'humain,<br />
                avec des professionnels de santé fournissant des soins experts
                et personnalisés.” <br />
                Vous avez des questions ou vous voulez contrbuier et savoir
                plus... <br />
                Alors, écrivez-nous !<br />
                Contactez-nous en utilisant le formulaire ci-a coté. Nous sommes
                impatients de vous aider
              </p>
            </div>
            <br /><br />
            <div class="fw-bold">
              Adresse: BP 1234 Sénégal <br />

              Tél: +221 77 123 45 67<br />

              Email: aknmediconnect44@gmail.com
            </div>
            <br /><br />
          </div>
        </div>
        <div class="formulaire row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <form
              action="page_contact.php"
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
                    >Prénom <span class="required">*</span></label
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
                  <label for="contactinfo"
                    >Email ou Téléphone<span class="required">*</span></label
                  >
                  <input
                    type="text"
                    id="contactinfo "
                    name="contactinfo"
                    required=""
                    placeholder="Email ou Téléphone"
                  />
                </div>

                <div class="form-group">
                  <label class="" for="objet"
                    >Objet : <span class="required">*</span></label
                  >
                  <input
                    type="text"
                    id="objet"
                    name="objet"
                    required=""
                    placeholder="objet"
                  />
                </div>
              </div>

              <div class="form-group">
                <label class="" for="message"
                  >Votre message <span class="required">*</span></label
                >
                <textarea
                  class=""
                  type="text"
                  name="message"
                  id="message"
                  required
                ></textarea>
              </div>

              <button class="bnt" type="submit">Envoyer</button>
            </form>
          </div>
        </div>
      </div>
       <!--Localisation -->
       <div class="col-sm-6 col-md-6 col-lg-9  m-auto">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16187.156895389136!2d-16.08821713709019!3d14.164917441073204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xee995b0f6e1af81%3A0x27996761ffc27606!2sKaolack!5e0!3m2!1sfr!2ssn!4v1755463011961!5m2!1sfr!2ssn"
         width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
    </section>
           <?php
                  require "../page-include/rejoind.php" ;
              ?>
      <?php
                  require "../page-include/footer.php" ;
        ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({});
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
