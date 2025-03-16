<?php
session_start();
session_destroy();
header("Location: /projetphp/projet_helico_pat/src/pages/homePage/homePage.php");
exit;
?>