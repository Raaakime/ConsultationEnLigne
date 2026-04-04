

<?php
session_start();
session_unset();
session_destroy();

// Utiliser un chemin relatif pour la redirection
header("Location: admin.php");
exit();
?>
