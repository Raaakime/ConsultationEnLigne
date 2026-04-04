<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/Rejoindre_nous.css" />
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

    <main>

      <section class="sec1">
              <?php
if (isset($_SESSION['form_message'])) {
    $message = $_SESSION['form_message'];
    $alertType = strpos($message, '✅') !== false ? 'success' : 'danger';
    echo '<div container class="alert alert-' . $alertType . ' alert-dismissible fade show">' . $message . 
    ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    unset($_SESSION['form_message']);
}
?>
        <div class="">
          <h3>TRAVAILLEZ AVEC NOUS</h3>
          <h1>Rejoindre l'équipe AKN MédiConnect</h1>
          <p>
            Nous sommes toujours à la recherche du meilleur talent spécialisé en
            technologie et innovation dans le secteur <br />
            de la santé afin de créer la meilleure équipe.
          </p>
        </div>
      </section>
      <section class="sec2">
        <div>
          <h3>POURQUOI NOUS REJOINDRE ?</h3>
          <p>
            Nous sommes une équipe de professionnels passionnés par la santé
            et<br />
            la technologie. Nous sommes convaincus que la technologie peut<br />
            révolutionner le secteur de la santé et améliorer la qualité de
            vie<br />
            des patients. Nous sommes toujours à la recherche de personnes<br />
            talentueuses et motivées pour rejoindre notre équipe et nous aider
            à<br />
            réaliser notre mission.
          </p>
          <p>
            Vous êtes un passionné des avancés technologiques dans le secteur
            de<br />
            la santé et voulez-vous faire partie de son développement ? Vous
            souhaitez travailler dans un environnement dynamique et innovant ?
          </p>
          <p>
            Si c’est le cas, on vous attend chez AKN MédiConnect. Vous aimez les
            défis, le travail en équipe <br />et vous souhaitez participer à un
            projet innovant? N’hésitez pas à partager votre CV. Nous sommes à la
            recherche d ‘esprits passionnés toujours en quête d’évolution.<br />
            Rejoignez-nous et contribuez à la transformation du secteur de la
            santé grâce à la technologie.
          </p>
        </div>
      </section>
      <section class="sec3">
        <div class="container col-8">
          <form
            action="rejoindre.php"
            method="post"
            enctype="multipart/form-data"
          >


            <h2 class="">Rejoindre l'équipe AKN MédiConnect</h2>

            <div class="mb-3">
              <label for="nom" class="form-label">Nom<span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="nom"
                name="nom"
                required
              />
            </div>

            <div class="mb-3">
              <label for="prenom" class="form-label">Prénom<span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="prenom"
                name="prenom"
                required
              />
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                required
              />
            </div>
            <div class="mb-3">
              <label for="telephone" class="form-label">Téléphone<span class="text-danger">*</span></label>
              <input
                type="tel"
                class="form-control"
                id="telephone"
                name="telephone"
                required
              />
            </div>

            <div class="mb-3">
              <label for="poste" class="form-label">Poste<span class="text-danger">*</span></label>
              <select name="poste" id="poste" class="form-label">
                <option value="developpeur">Développeur Frontend</option>
                <option value="developpeur_backend">Développeur Backend</option>
                <option value="designer">Designer</option>

                <option value="marketing">Marketing</option>
                <option value="communication">Communication</option>
                <option value="autre">Autre</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="cv" class="form-label">CV<span class="text-danger">*</span></label>
              <input
                type="file"
                class="form-control"
                id="cv"
                name="cv"
                required
              />
            </div>
            <div class="mb-3">
              <label for="lettre_motivation" class="form-label"
                >Lettre de motivation<span class="text-danger">*</span></label
              >
              <input
                type="file"
                class="form-control"
                id="lettre_motivation"
                name="lettre_motivation"
                required
              />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message<span class="text-danger">*</span></label>
              <textarea
                class="form-control"
                type="text"
                id="message"
                name="message"
                rows="3"
                required
              ></textarea>
            </div>
            <input
              type="submit"
              class="btn btn-primary"
              value="Envoyer votre demande"
            />
          </form>
        </div>
      </section>
       <?php
                  require "../page-include/rejoind.php" ;
              ?>
    </main>

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
