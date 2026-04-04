<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page A propos</title>
    <link rel="stylesheet" href="../css/apropos_de_nous.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!--Redirection include de notre accueil-->
    <?php
       require "../page-include/accueil.php" ;
    ?>

      <!--Section principale de notre page-->
    <section>
      <!--Sections a propos de nous-->
      <section>
        <div class="tex1">
          <h4>À PROPOS DE NOUS</h4>
          <h1>
            Nous accompagnons la <br />
            transformation digitale du <br />
            secteur de la santé.
          </h1>
          <p class="mx-5 mt-3">
            AKN-médiconnect est une société de santé digitale qui propose des
            <br />
            solutions de télémédecine aux professionnels de la santé,
            hôpitaux,<br />
            compagnies d'assurance et plus généralement les grandes
            <br />entreprises de la santé.
          </p>
        </div>
      </section>
      <section>
        <div class="tex2 d-flex justify-content-around">
          <h2 class="mt-5">Notre mission:</h2>
          <div class="text">
            Notre objectif est de faciliter la communication online entre <br />
            médecin et patient via une plateforme sécurisée qui offre les<br />
            services de consultation vidéo, chat médical, prescription<br />
            électronique et gestion des patients tout en prenant soin de<br />
            l’expérience utilisateur et facilitant l'accès à un hôpital
            virtuel<br />
            qui offre médecine générale et pédiatrie 24/7 et un réseau de
            qualité<br />
            médecins et plusieurs spécialités à la demande.
          </div>
        </div>
      </section>
      <section>
        <div class="tex3">
          <h2 class="text-center mb-4">Notre histoire</h2>
          <div>
            Fondée en 2025 par Abdou karime NDIAYE. AKN MédiConnect a fait ses
            premiers pas dans la digitalisation de la prescription médicale.
            Aujourd’hui, AKN MédiConnect est une plateforme de télémédecine 360º
            la plus complète du marché, et qui propose des solutions aux
            différents acteurs du secteur de la santé.
          </div>
          <div>
            Avec l’ouverture de notre première filiale au Sénégal, Kaolack en
            2025 pour s’attaquer à la zone hurbaine et d'autres partie du pays,
            AKN MédiConnect va adopter une stratégie de nationalisation dans les
            14 régions du pays.
          </div>
          <div>
            AKN MédiConnect pas encore nouer des partenariats avec des
            compagnies d’assurances, il en les besoins et aussi avec des
            Multinationales pharmaceutiques , des groupements de cliniques
            privées et public, des Hôpitaux et Centres Hospitaliers
            Universitaires à savoir les instituts d’oncologie développant des
            projets pour les patients en oncologie.
          </div>
        </div>
      </section>
  <!---Fin du section-->

      <section class="bg-primary-subtle text-primary-emphasis">
        <div class="d-flex m-5">
          <div class="my-5 ps-5">
            <h2>Notre équipe</h2>
            <p>
              Nous sommes une équipe passionnée par la technologie au service de
              la santé et l’innovation, nous sommes toujours en quête d’offrir
              la meilleure expérience à nos utilisateurs. Pour former la
              meilleure équipe, nous comptons sur des personnes engagées, avec
              des expériences et des ambitions différentes mais avec un objectif
              commun : accompagner la transformation digitale du secteur de la
              santé.
            </p>
            <p>
              Les professionnels de notre équipe sont répartis sur l’ensemble du
              territoire du Sénégale, et nos locaux sont basés à Kaolack et
              Dakar.
            </p>
          </div>
          <div><img src="../images/sectr.png" alt="" /></div>
        </div>
      </section>

        <!--Redirection include de notre notre section rejoindre nous-->
             <?php
                  require "../page-include/rejoind.php" ;
              ?>
    </section>
    <!--Fin section principale-->

    <!---Redirection include partie footer ou notre pied de page--->
        <?php
                  require "../page-include/footer.php" ;
        ?>


      <!--Parties scripts-->
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
