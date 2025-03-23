<?php
require_once '../../controllers/fonctions.php';
session_start();
session_destroy();
header('Location: ' . BASE_URL . 'pages/homePage/homePage.php');
exit();
?>