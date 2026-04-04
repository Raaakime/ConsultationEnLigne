<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des patient</title>
    <link rel="stylesheet" href="../css/gestions.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>

    <!---Include partie accueil-->
  
      <?php
       require "../page-include/accueil.php" ;
    ?>
  <!---Gestion des patients-->
    <main>
      <section class="mtop fw-bold m-5">
        <div class="sec row">
          <div class="pt col-sm-12 col-md-6 col-lg-6 col-12">
            <p>GESTION DE PATIENTS</p>
            <h1 class="fw-bold">
              Toute la gestion de votre patientèle au même endroit.
            </h1>
            <div>
              Agenda, historique médical, plateforme de paiement, landing page
              personnalisée, le tout sur une seule plateforme.
            </div>
            <div class="d-flex m-2 mt-4">
              <a
                href="../Page_connexion/Formulaire_de_connexion.php"
                class="btn btn-primary text-decoration-none fw-bold"
                >Essai Gratuit</a
              >
              <a
                href="../Page_de_contact/Page_de_contact.php"
                class="text-decoration-none mt-2 ms-4"
                >Nous contacter</a
              >
            </div>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <img class="img-fluid pb-3" src="../images/p.avif" alt="" />
          </div>
        </div>
      </section>

      <section class="m-5 fw-bold">
        <div class="secs row mt-5">
          <div class="mt-4 col-sm-12 col-md-6 col-lg-6 col-12">
            <img class="rdv img-fluid" src="../images/gest.png" alt="" />
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <p>AGENDA EN LIGNE</p>
            <h1 class="fw-bold">
              Rendez-vous présentiels sur la même plateforme
            </h1>
            <div>
              Combinez votre agenda de consultations présentielles avec celui
              des consultations en vidéo sur la même plateforme, et configurez
              la durée de chaque consultation. Vous pouvez également configurer
              vos disponibilités, la durée et le prix de vos consultations; vos
              patients pourront avoir accès à votre calendrier et prendre
              rendez-vous depuis n’importe quel appareil en fonction de vos
              disponibilités en temps réel. N’oubliez pas de synchroniser votre
              calendrier avec les autres applications/ systèmes que vous
              utilisez pour centraliser toutes vos consultations au même
              endroit.
            </div>
          </div>
        </div>
      </section>

      <section class="m-5 fw-bold">
        <div class="sec row pb-3">
          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <p>DOSSIER MÉDICALE</p>
            <h1 class="fw-bold">
              Accédez facilement aux antécédents cliniques de chaque patient et
              mettez-les à jour.
            </h1>
            <div class="">
              Numériser toutes les données relatives aux antécédents médicaux
              d’un patient au sein de la plateforme. Vous pouvez accéder aux
              informations depuis n’importe quel appareil électronique, ajouter
              des données ou effectuer des modifications immédiatement et sans
              intermédiaire. AKN MédeiConnect, nous garantissons un haut niveau
              de sécurité pour les informations médicales des patients afin
              d’assurer la confidentialité.
            </div>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <img class="dossier img-fluid m-2" src="../images/medi.jpg" alt="" />
          </div>
        </div>
      </section>

      <section class="m-5 fw-bold">
        <div class="sec row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <img class="img-fluid" src="../images/paym.png" alt="" />
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6 col-12">
            <p>PLATEFORME DE PAIEMENT</p>
            <h1 class="fw-bold">
              Générez des revenus récurrents avec votre cabinet en ligne
            </h1>
            <div>
              Depuis votre profil, vous pouvez configurer le prix de vos
              services de consultation vidéo. Notre point de vente virtuel vous
              permet de configurer des minutes et d’appliquer un prix spécifique
              en fonction de la durée ou du type de service. Vos patients auront
              accès au paiement en ligne dès qu’ils auront pris leur rendez-vous
              depuis notre POS et avant de réaliser la consultation médicale. De
              plus, vous pourrez générer automatiquement la facture pour chaque
              consultation depuis la plateforme Docline. L’argent sera transféré
              directement sur votre compte dans les 5 jours ouvrables via notre
              plateforme de paiement.
              <strong> NB:</strong> Pour le moment, nous n’offrons pas de
              service de paiement en ligne.
            </div>
          </div>
        </div>
      </section>

      <!--Incliude rejoindre nous-->
           <?php
                  require "../page-include/rejoind.php" ;
              ?>
    </main>

    <!--include footer-->
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
