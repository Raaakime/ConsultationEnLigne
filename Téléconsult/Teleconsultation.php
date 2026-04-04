<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Téléconsultation</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/Teleconsult.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
      <?php
          require "../page-include/accueil.php" ;
      ?>

    <section>
      <section class="secprinci">
        <section class="m-5 fw-bold">
          <div class="sec row">
            <div class="p-5 col-sm-12 col-md-6 col-lg-6 col-12">
                <p>CONSULTATION À DISTANCE</p>
                <h1 class="fw-bold">Vidéo, chat et appel téléphonique</h1>
              <div>
                Connectez-vous avec vos patients depuis n'importe quel support,
                sans contrainte géographique.
              </div>
              <div class="d-flex m-2 mt-4">
                <a href="../Page_connexion/Formulaire_de_connexion.php" class="btn btn-primary text-decoration-none fw-bold">Essai Gratuit</a>
                <a href="../Page_de_contact/Page_de_contact.php" class="text-decoration-none mt-2 ms-4">Nous contacter</a>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                <img class="img-fluid" src="../images/Chat-n.png" alt="" />
            </div>
          </div>
        </section>

        <section class="fw-bold sec2">
          <div class="row ps-5 pe-5">
            <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                <img class="w1" src="../images/conslt.jpg" alt="" />
            </div>
            <div class="pt-5 col-sm-12 col-md-6 col-lg-6 col-12">
                <p>UNE MEILLEURE COMMUNICATION AVEC LE PATIENT</p>
              <br />
                 <h1 class="fw-bold"> Offre des nouveaux canaux de communication avec vos patients</h1>
              <div class="">La <b>consultation vidéo</b> vous permet de réaliser un suivi
                            personnalisé, exclusif et confidentiel ( Connexion chiffrés en
                            HD) de l’état du patient de la même manière que lorsque ce
                            dernier est dans votre cabinet, mais sans contrainte
                            géographique. <br /><br />
                            Vous disposez aussi de la possibilité de réaliser un appel
                            téléphonique directement depuis la plateforme par VoIP. Cette
                            fonctionnalité est très utile pour communiquer avec les patients
                            qui ne disposent pas de smartphone ou d’un accès à internet.
              </div>
            </div>
          </div>
        </section>

        <section class="fw-bold">
          <div class="row p-5 sec3">
            <div class="col-sm-12 col-md-6 col-lg-6 col-12">
                <img class="img-fluid" src="../images/7t.png" alt="" />
            </div>
            <div class="fw-bold pt-5 col-sm-12 col-md-6 col-lg-6 col-12">
                  <p>UN SUIVI MÉDICAL CONTINU ET ORGANISÉ</p>
              <h1>Partagez et recevez des rapports médicaux, images instantanément.</h1>
              <div>
                    Le chat permet un contact direct avec le patient, offrant la
                    possibilité de partager et de recevoir des rapports médicaux,
                    imagerie et tous examens complémentaires d’une manière
                    instantané ou asynchrone. <br /><br />

                    Toutes les conversations sont sauvegardées et organisées dans
                    votre tableau de bord par date, de telle manière que vous
                    puissiez disposer toujours à portée de main de l’historique
                    médicale du patient. <br /><br />
                    A travers le chat vous pouvez aussi lancer une interconsultation
                    avec les professionnels de la même clinique ou entité, ce qui
                    vous permet de partager des expériences, dossiers et historiques
                    médicaux d’une façon simplifiée.
              </div>
            </div>
          </div>
        </section>
      </section>
      <section class="sec4 row">
        <div class="col-12">
          <div class="bckg text-center pt-5">
            <h4>TECHNOLOGIE</h4>
            <p class="pt-5">
              Une solution sécurisée, personnalisable et facile à intégrer
              <br />
              Respect de tous les protocoles de sécurité. Conformité au GDPR et
              à l’HIPAA. <br />
              Tous nos produits peuvent être facilement intégrés à d’autres
              systèmes : API, SDKs, webview. <br />
              Disponible en marque blanche, en s’adaptant à votre image de
              marque.
            </p>
          </div>
        </div>
      </section>

             <?php
                   require "../page-include/rejoind.php" ;
             ?>
    </section>

         <?php
                  require "../page-include/footer.php" ;
          ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
  </body>
</html>
