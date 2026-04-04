<?php
session_start();
session_unset();
session_destroy();
header("Location: ../Page_connexion/Formulaire_de_connexion.html");
exit();
?>
