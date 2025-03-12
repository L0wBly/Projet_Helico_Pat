<?php
echo "Hello World!";

session_start();

require_once 'fonctions.php';

if (!isset($_SESSION["pseudo"])) {
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>